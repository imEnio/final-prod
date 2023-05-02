<?php

namespace App\View\Components;

use App\Models\Message;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ladmin extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render($page=1): View|Closure|string
    {
        $msg = Message::with('user')->limit(20)->offset(($page-1)*20)->latest()->get();

        return view('components.ladmin', ['msg' => $msg]);
    }
}
