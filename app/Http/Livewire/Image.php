<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
class Image extends Component
{
    use WithFileUploads;
    public $image;

    public function render()
    {
        return view('livewire.image');
    }
}
