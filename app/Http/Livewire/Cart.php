<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class Cart extends Component
    {
        public $cart;
        public $is_active = true;
        public $product = [];
        protected $listeners = ['turnOn' => 'buttonsOn'];

        public function render()
        {
            $this->cart = [];
            if (isset(session()->all()['cart'])) {
                $this->cart = session()->all()['cart'];
            }

            return view('livewire.cart');
        }

        public function increment()
        {
            $this->product['count'] += 1;
            $cart = session()->all()['cart'];
            $cart[$this->product['id'] - 1]['count'] += 1;

            session(['cart' => $cart]);
            $this->priceUpdate();

            $this->emit('cart_update');
        }

        public function priceUpdate()
        {
            if (isset(session()->all()['cart'])) {
                $count = 0;
                foreach (session()->all()['cart'] as $product) {
                    $count += $product['count'];
                }
                $price = $count * 2190;
                session(['price' => $price]);
            } else {
                session(['price' => 0]);
            }
        }

        public function decrement()
        {
            $this->product['count'] = $this->product['count'] + 1;
            $cart = session()->all()['cart'];
            $cart[$this->product['id'] - 1]['count'] -= 1;
            if ($cart[$this->product['id'] - 1]['count'] == 0) {
                unset($cart[$this->product['id'] - 1]);
            }

            session(['cart' => $cart]);
            if (empty($cart)) session()->forget('cart');
            $this->priceUpdate();

            $this->emit('cart_update');
        }

        public function productRemove()
        {
            $cart = session()->all()['cart'];
            unset($cart[$this->product['id'] - 1]);
            session(['cart' => $cart]);
            if (empty(session()->all()['cart'])) session()->forget('cart');

            $this->priceUpdate();

            $this->emit('cart_update');
        }

        public function turn()
        {
            $this->is_active = false;

            $this->emit('cart_loading');
            $this->emit('turnOn');
        }

        public function buttonsOn()
        {
            usleep(400000);

            $this->is_active = true;
        }
    }
