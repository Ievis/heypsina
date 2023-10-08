<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class Checkout extends Component
    {
        public $price;
        public $shipment;
        public $city_option;
        public $city;
        public $delivery_option;
        public $other;

        public function render()
        {
            if (old('city_option')) $this->city_option = old('city_option');
            if (old('city')) $this->city = old('city');

            $this->shipment = 299;
            $this->other = true;
            $this->delivery_option = "Доставка";
            session()->forget('vlad');
            if ($this->city == 'Владивосток') {
                $this->city_option = 'Владивосток';
                $this->city = '';
            }
            if ($this->city_option == "Владивосток") {
                $this->other = false;
                $this->shipment = 0;
                $this->delivery_option = "Самовывоз";
                session(['message' => 'Для Владивостока доступен самовывоз по адресу ул. Толстого, 23']);
                session(['vlad' => true]);
            }
            if ($this->city_option != 'Владивосток') {
                session(['message' => 'Доставка только по почте России']);
            }
            if (empty($this->city_option)) {
                session()->forget('message');
                $this->other = false;
            }

            $this->price = session()->all()['price'] ?? 0;
            $this->resetErrorBag();

            return view('livewire.checkout');
        }
    }
