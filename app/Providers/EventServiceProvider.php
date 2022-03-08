<?php

namespace App\Providers;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Models\{
    Complain,
    Order};

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();



        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            $userEmail = auth()->user()->email;
            $complains = Complain::all();
            $complainUserCountProcessing = auth()->user()->complains->where('status', 'processando')->count();
            $complainUserCountFineshed = auth()->user()->complains->where('status', 'concluído')->count();
            $complainTotal = $complainUserCountProcessing +  $complainUserCountFineshed ;
            $complainAllOpen = Complain::where('status', 'aberto')->count();
            $ordersAllOpen = Order::where('status', 'aberto')->count();
            $orderComplainTotal =  $complainAllOpen +  $ordersAllOpen;


            // Add some items to the menu...
            $event->menu->add('Informações do Sistema');
            
                

           if( in_array($userEmail, config('acl.admins'))){
                $event->menu->add([
                    'text' => 'Notificações',
                    'url' => 'admin/orders/states',
                    'label'       =>   $orderComplainTotal,
                     'label_color' => 'danger',
                     'icon' => 'fas fa-fw fa-bell',
                ]);
            }
                else {
                    $event->menu->add([
                        'text' => 'Notificações',
                        'url' => 'admin/orders/states',
                        'label'       =>  $complainTotal,
                         'label_color' => 'danger',
                         'icon' => 'fas fa-fw fa-bell',
                    ]);
                }
            
            
        });


        // Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
        //     $usersCount = User::count();
        //     $event->menu->add(trans('menu.pages'));

        //     $items = User::all()->map(function (User $user) {
        //         return [
        //             'text' => $page['title'],
        //             'url' => route('admin.pages.edit', $page)
        //         ];
        //     });

        //     $event->menu->add(...$items);
        // });
    }
}
