<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\OrderRequest;
    use App\Mail\RegisterMail;
    use App\Models\Customer;
    use App\Models\Order;
    use App\Models\OrderedProduct;
    use Illuminate\Support\Facades\Mail;
    use YooKassa\Client;
    use App\Services\RandomService;

    class PaymentController extends Controller
    {

        public function __invoke(OrderRequest $request)
        {
            if (empty(session('price'))) return redirect('/cart');

            $is_vlad = session('vlad', false);

            $validated_request = $this->trimRequestFields($request->validated());
            if ($is_vlad) $validated_request['city'] = 'Владивосток';

            $session_id = RandomService::v4();
            session(['session_id' => $session_id]);
            $price = empty($is_vlad) ? session('price') + 299 : session('price');

            $order_data = $this->setYookassaConnection($price);
            $customer = $this->createCustomer($validated_request);
            $order = $this->createOrder($order_data['order_id'], $customer->id, $validated_request['comment'], $price, $session_id);
            $this->createOrderedProducts($order);

            return redirect()->away($order_data['confirmation_url']);
        }

        private function trimRequestFields($request_data)
        {
            $request_data['email'] = str_replace(' ', '', $request_data['email']);
            $request_data['phone_number'] = str_replace(' ', '', $request_data['phone_number']);
            array_walk($request_data, function ($value) {
                return trim($value, " \t\n\r\0\x0B");
            });
            return $request_data;
        }

        private function setYookassaConnection($price)
        {
            $client = new Client();
            $client->setAuth(env('YOOKASSA_SHOP_ID'), env('YOOKASSA_SECRET_KEY'));

            $idempotenceKey = uniqid('', true);
            try {
                $response = $client->createPayment(
                    array(
                        'amount' => array(
                            'value' => $price,
                            'currency' => 'RUB',
                        ),
                        'payment_method_data' => array(
                            'type' => 'bank_card',
                        ),
                        'confirmation' => array(
                            'type' => 'redirect',
                            'return_url' => 'https://heypsina.ru/success',
                        ),
                        'capture' => true,
                        'description' => 'HEY PS!NA MATRIX TEE'
                    ),
                    $idempotenceKey
                );
            } catch (\Exception $e) {
                return redirect('/checkout')->withErrors('Неизвестная ошибка, попробуйте ещё раз');
            }

            return [
                'order_id' => $response->_id,
                'confirmation_url' => $response->getConfirmation()->getConfirmationUrl()
            ];
        }

        private function createCustomer($validated_request)
        {
            $validated_request = collect($validated_request)->except(['city_option', 'comment'])->toArray();

            $customer = new Customer($validated_request);
            $customer->save();

            return $customer;
        }

        private function createOrder($order_id, $customer_id, $comment, $price, $session_id)
        {
            $order = new Order([
                'order_id' => $order_id,
                'customer_id' => $customer_id,
                'amount' => $price,
                'status' => 'pending',
                'session_id' => $session_id,
                'comment' => $comment
            ]);
            $order->save();

            return $order;
        }

        private function createOrderedProducts($order)
        {
            foreach (session('cart') as $product) {
                $ordered_product = new OrderedProduct([
                    'color' => $product['color'],
                    'size' => $product['size'],
                    'count' => $product['count'],
                    'order_id' => $order->id,
                    'image' => $product['photo']
                ]);
                $ordered_product->save();
            }
        }
    }
