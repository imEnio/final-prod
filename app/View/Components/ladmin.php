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
    public function render(): View|Closure|string
    {

        $msg = Message::with('user')->get();
        $user = User::all();

        return view('components.ladmin', ['msg' => $msg, 'user' => $user]);
    }
}
