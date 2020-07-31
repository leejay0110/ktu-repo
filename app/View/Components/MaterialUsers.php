<?php

namespace App\View\Components;

use App\User;
use App\Material;
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
        $users = User::whereHas('roles', function($q){
            $q->whereIn('roles.name', ['cm upload']);   
        })->get();
        
        $materials = Material::latest()->limit(3)->get();

        return view('components.material-users', [
            'users' => $users,
            'materials' => $materials
        ]);
    }
}
