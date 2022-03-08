<?php

namespace App\Listeners;

use App\User;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuildMenuListener
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
     * @param  BuildingMenu  $event
     * @return void
     */
    public function handle(BuildingMenu $event)
    {
        $usersCount = User::count();

        $event->menu->add('MAIN NAVIGATION');
        $event->menu->add([
            'text'        => 'Users',
            'url'         => 'admin/users',
            'icon'        => 'users',
            'label'       => $usersCount,
            'label_color' => 'success'
        ]);
    }
}
