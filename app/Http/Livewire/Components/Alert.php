<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Alert extends Component
{
    public $message;

    public $title;

    public $status;

    public function render()
    {
        $alert = Session::get('result');
        $this->message = $alert['message'] ?? 'lorem ipsum dolor sit amet, lorem ipsum dolor sit amet';
        $this->title = $alert['title'] ?? 'This is a title';
        $this->status = $alert['status'] ?? 'primary';

        return view('livewire.components.alert');
    }
}
