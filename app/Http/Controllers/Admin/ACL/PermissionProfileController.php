<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Profile,
    Permission
};

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile =$profile;
        $this->permission =$permission;
        $this->middleware(['can:permissions']);
        $this->middleware(['can:profiles']);
    }

    public function permissions($Idprofile)
    {

        $profile =  $this->profile->with('permissions')->find($Idprofile);

        if (!$profile)
        return redirect()->back();

        $permissions = $profile->permissions;


        return view('Admin.pages.profiles.permissions.permissions', compact(['profile','permissions']));
    }

    public function permissionsAvalaible( Request $request ,$Idprofile)
    {



        if (!$profile =  $this->profile->find($Idprofile))
        return redirect()->back();

            $filters = $request->except('_token');

        $permissions = $profile->permissionsAvalaible($request->filter);

        return view('Admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }
    public function attachPermissionProfile(Request $request , $Idprofile)
    {

        $profile =  $this->profile->find($Idprofile);

        if (!$profile)
        return redirect()->back();

        if ( !$request->permissions || count($request->permissions) == 0){
            return redirect()->back()
                                    ->with('message', 'Tem de selecionar pelo menos uma permissao');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions', $profile->id);
    }

    public function detachPermissionProfile($idprofile, $idPermission)
    {
            $profile = $this->profile->find($idprofile);
            $permission = $this->permission->find($idPermission);

            if(!$profile || !$permission) {
                return redirect()->back();
            }

            $profile->permissions()->detach($permission);

            return redirect()->route('profiles.permissions', $profile->id);
    }

    public function profiles($idPermission)
    {
            $permission  = $this->permission->find($idPermission);

            if(!$permission) {
                return redirect()->back();
            }

            $profiles = $permission->profiles;

            return view('Admin.pages.permissions.profiles.profiles', compact(['profiles','permission']));
    }


}
