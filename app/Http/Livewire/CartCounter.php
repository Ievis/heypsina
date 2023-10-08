<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class CartCounter extends Component
    {
        public $count;
        public $is_added = false;
        protected $listeners = ['cart_update' => 'render', 'cart_loading' => 'initiateLoading', 'cart_load' => 'loadingCart'];

        public function render()
        {
            $this->count = 0;
            if (isset(session()->all()['cart'])) {
                array_walk(session()->all()['cart'], function ($value) {
                    $this->count = $this->count + $value['count'];
                });
            }

            session(['price' => $this->count * 2190]);

            return view('livewire.cart-counter');
        }

        public function initiateLoading()
        {
            $this->is_added = true;

            $this->emit('cart_load');
        }

        public function loadingCart()
        {
            usleep(400000);

            $this->is_added = false;
        }
    }
