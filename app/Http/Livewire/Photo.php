<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class Photo extends Component
    {
        public $photo;
        public $readyToLoad = false;
        protected $listeners = ['photo_updated' => 'render'];

        public function render()
        {
            $id = session('color_id', 1);

            $this->photo = \App\Models\Photo::where('id', $id)->first();
            usleep(250000);

            return view('livewire.photo', [
                'photo' => $this->readyToLoad
                    ? $this->photo
                    : ''
            ]);
        }

        public function loadPhoto()
        {
            $this->readyToLoad = true;
        }
    }
