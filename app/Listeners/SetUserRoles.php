<?php

namespace App\Listeners;

use App\Role;
use App\Events\NewUserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetUserRoles
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewUserRegistered  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {
        switch ($event->roles) {
            case 'pep upload':
                
                $role = Role::where('name', 'pep upload')->firstOrFail();
                $event->user->roles()->attach($role->id);
                break;

            case 'cm upload':
                
                $role = Role::where('name', 'cm upload')->firstOrFail();
                $event->user->roles()->attach($role->id);
                break;

            case 'both':
                
                $role = Role::where('name', 'pep upload')->firstOrFail();
                $event->user->roles()->attach($role->id);
                $role = Role::where('name', 'cm upload')->firstOrFail();
                $event->user->roles()->attach($role->id);
                break;
            
            default:
                break;
        }
    }
}
