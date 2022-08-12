<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Demo;

class Counter extends Component
{
    public $count = 0;

    public function increment()
    {
        $count = $this->count++;

        $demo = new Demo;
        $demo->count = $count;
        $demo->save();
        session()->flash('message','Counter '.$count.' saved successfully.');
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
