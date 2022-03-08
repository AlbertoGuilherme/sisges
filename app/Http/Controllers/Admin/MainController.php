<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Order,
    Permission,
    Product,
    Profile,
    Complain
};
use App\User;

class MainController extends Controller
{
    public function site(){
        $profiles = Profile::get();
        return view('site.index', compact('profiles'));
    }
    public function index()
    {
            $hour = now('Africa/Luanda');
            $userLogged = auth()->user()->name;
            $totalUsers = User::count();
            $totalProfiles = Profile::count();
            $totalPermissions = Permission::count();
            $totalOrders = Order::count();
            $totaProducts = Product::count();
            $totalComplains = Complain::count();
          /**
           * Pegando apenas os dados do usuário
           */
            $userComplain = auth()->user()->complains()->count();
            $userOrders  = auth()->user()->orders()->count();
            
            return view('admin.pages.home', compact([
                'hour',
                'userLogged',
                'totalUsers',
                'totalProfiles',
                'totalPermissions',
                'totalOrders',
                'totaProducts',
                'userComplain',
                'userOrders',
                'totalComplains'
                ]));
    }

    public function proUser($id){
           if( !$profile = Profile::where('id',$id)->first()){
               return redirect()->back();
           }

           session()->put('profile', $profile);

            return redirect()->route('register');
    }
}
