<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\storeUpdateUser;

class UserController extends Controller
{
    protected $repository;

    public function __construct(User $user)
    {
        $this->repository =$user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  $this->repository->tenantUser()->paginate();

        return view('Admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.users.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUpdateUser $request)
    {
        $user = $this->repository;
       $user->create($request->all());
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$user =  $this->repository->tenantUser()->find( $id))
        return redirect()->back();

        return     view('Admin.pages.users.show', compact('user'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$user =  $this->repository->tenantUser()->find( $id))
        return redirect()->back();

        return view('Admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUpdateUser $request, $id)
    {
        if (!$user =  $this->repository->tenantUser()->find( $id))
        return redirect()->back();


   $data = $request->only(['name', 'email', 'sigu']);

   if ($request->password) {
       $data['password'] = bcrypt($request->password);
   }
        $user->update($data);
        return redirect()->route('users.index')->with('message', 'Dados do utilizador alterados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$user =  $this->repository->tenantUser()->find( $id))
        return redirect()->back();
        $user->delete();
        return redirect()->route('users.index');
    }
    public function search(Request $request)
    {

        $filters = $request->only('filter');
        $users =  $this->repository
                        ->where(function($query) use ($request){
                            if($request->filter){
                                $query->where('name', $request->filter)
                                ->orWhere('description', 'LIKE', "%{$request->filter}%");
                            }
                        })->paginate()->tenantUser();

        return view('Admin.pages.users.index', compact('filters', 'users'));
    }

    public function alter($id)
    {
        if (!$user =  $this->repository->find( $id))
        return redirect()->back();

        return     view('Admin.pages.users.alter', compact('user'));

    }
}
