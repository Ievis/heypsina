<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class CartList extends Component
    {
        public $cart;
        public $price;
        public $isPaymentVisible;
        protected $listeners = ['cart_full_clear' => 'render', 'cart_update' => 'render'];

        public function render()
        {
            $this->cart = [];
            $this->price = 0;
            $this->isPaymentVisible = false;
            if (isset(session()->all()['cart'])) {
                $this->cart = session()->all()['cart'];
                $this->price = session()->all()['price'];
                $this->isPaymentVisible = true;
            }

            return view('livewire.cart-list');
        }
    }
