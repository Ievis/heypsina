<?php

    namespace App\Http\Livewire;

    use Livewire\Component;
    use App\Models\Photo;

    class MakeOrder extends Component
    {
        public $color;
        public $size;
        public $count;
        public $cart;
        public $is_added = false;
        public $isPhotoChanged = false;
        public $is_button_blocked = false;
        public $order_clicks = 1;
        protected $listeners = ['show_added' => 'showAdditionToCart'];
        private $colors = [1 => 'Зелёный', 2 => 'Розовый', 3 => 'Белый'];

        public function mount()
        {
            $this->color = "Зелёный";
            $this->size = "S";
            $this->count = 1;
        }

        public function render()
        {
            $this->is_button_blocked = (int)$this->count <= 0 || (int)$this->count >= 1000;
            if ($this->is_button_blocked) $this->count = '';

            return view('livewire.make-order');
        }

        public function tableShow()
        {
            $this->emit('change_table_visibility');
        }

        public function updatedColor()
        {
            foreach ($this->colors as $color_id => $color) {
                if ($color === $this->color) session(['color_id' => $color_id]);
            }

            $this->emit('photo_updated');
        }

        public function initiateAddition()
        {
            $this->is_added = true;

            $this->emit('cart_loading');
            $this->emit('show_added');
        }

        public function showAdditionToCart()
        {
            usleep(400000);

            $this->is_added = false;
        }

        public function addToCart()
        {
            $this->count = (int)$this->count;
            if ($this->count <= 0 || $this->count >= 1000) return redirect('/');

            foreach ($this->colors as $color_id => $color) {
                if ($color === $this->color) $id = $color_id;
            }
            $photo = Photo::find($id);

            $session = session()->all();

            if (isset($session['cart'])) {
                $new_session = array_map(function ($value) use ($photo) {
                    if ($value['photo'] == $photo->url && $value['size'] == $this->size) {
                        $value['count'] = $value['count'] + $this->count;
                        return $value;
                    }
                    return $value;
                }, $session['cart']);

                if ($new_session == $session['cart']) {
                    $new_session[] = [
                        'id' => end($session['cart'])['id'] + 1,
                        'name' => 'Футболка MATRIX TEE',
                        'color' => $this->colors[$id],
                        'photo' => $photo->url,
                        'size' => $this->size,
                        'count' => $this->count
                    ];
                }

                session()->put(['cart' => $new_session]);

            } else {
                session(['cart' => [
                    [
                        'id' => 1,
                        'name' => 'Футболка MATRIX TEE',
                        'color' => $this->colors[$id],
                        'photo' => $photo->url,
                        'size' => $this->size,
                        'count' => $this->count
                    ]
                ]
                ]);
            }

            $this->emit('cart_update');
        }
    }
