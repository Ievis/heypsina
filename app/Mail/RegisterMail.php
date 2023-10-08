<?php

    namespace App\Mail;

    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class RegisterMail extends Mailable
    {
        use Queueable, SerializesModels;

        private $order;
        private $products;
        private $customer;
        private $is_paid;

        /**
         * Create a new message instance.
         *
         * @return void
         */
        public function __construct($order, $products, $customer, $is_paid = true)
        {
            $this->order = $order;
            $this->products = $products;
            $this->customer = $customer;
            $this->is_paid = $is_paid;
        }

        /**
         * Build the message.
         *
         * @return $this
         */
        public function build()
        {
            return $this->view('mail.success', [
                'order' => $this->order,
                'products' => $this->products,
                'customer' => $this->customer,
                'is_paid' => $this->is_paid
            ])
                ->subject('Подтверждение заказа HEYPS!NA');
        }
    }
