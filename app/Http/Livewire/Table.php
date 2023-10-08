<?php

    namespace App\Http\Livewire;

    use Livewire\Component;

    class Table extends Component
    {
        public $is_table_visible = false;
        public $animate = false;
        protected $listeners = ['change_table_visibility' => 'changeTableVisibility'];

        public function render()
        {
            return view('livewire.table');
        }

        public function changeTableVisibility()
        {
            $this->is_table_visible = !$this->is_table_visible;
        }
    }
