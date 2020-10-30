<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;
class Example extends Component
{
    public $exampleData,$public_var,$users;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($exampleData)
    {
        $this->exampleData = $exampleData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $this->users = User::all();
        return view('components.example');
    }
}
