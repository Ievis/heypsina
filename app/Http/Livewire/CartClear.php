<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class CartClear extends Component
    {
        public $is_cart_empty;

        public function render()
        {
            $this->is_cart_empty = empty(session('cart'));

            return view('livewire.cart-clear');
        }

        public function cartClear()
        {
            session()->forget('cart');
            session()->forget('price');

            $this->emit('cart_update');
            $this->emit('cart_full_clear');
        }
    }
