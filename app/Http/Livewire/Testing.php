<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Testing extends Component
{
    public $puta;
    public function render()
    {
       
        return view('livewire.testing');
    }
    public function showAlert()
    {
  
        $this->puta = 'dawdawd';
        $this->emit('putangina', ['message' => 'Hello World!']);
    }
    
}
