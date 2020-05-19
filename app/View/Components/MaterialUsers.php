<?php

namespace App\View\Components;

use App\User;
use Illuminate\View\Component;

class MaterialUsers extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $users = User::select(['id', 'name'])->where('admin', 0)->orderBy('name')->get();
        return view('components.material-users', [
            'users' => $users
        ]);
    }
}
