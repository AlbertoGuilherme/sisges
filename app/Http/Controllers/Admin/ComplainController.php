<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complain;
use App\Http\Requests\storeUpdateComplain;
use App\Notifications\NewOrder;
use App\User;
use Illuminate\Notifications\Notifiable;

class ComplainController extends Controller
{
    use Notifiable;
    protected $repository;

    public function __construct(Complain $complain, User $user)
    {

        $this->repository =$complain;
        $this->user =$user;
        $this->middleware(['can:complains']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->user;

        $complains =  $this->repository->paginate();

        $complainsAd =  $this->repository->paginate();

      $complains = auth()->user()->complains;

        return view('Admin.pages.complains.index', compact(['complains',  'complainsAd', 'user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('Admin.pages.complains.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(storeUpdateComplain $request,  int $qtyCaraceters = 8)
    {

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;
        $characters = $numbers;


        $complain = $this->repository;
        $open = "aberto";


        // dd($request->all());

        $user = config('acl.admins');
        $request['own_name'] = auth()->user()->name;
        $request['identify'] = substr(str_shuffle($characters), 0, $qtyCaraceters) ;
        $request['user_id'] =  auth()->user()->id ;
        $request['status'] =  $open ;
        // dd($request->all());
       $complain->create($request->all());
       dd($user->notify(new NewOrder($user)));
        return redirect()->route('complains.index');


        //    notify(new NewOrder(auth()->user()->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$complain =  $this->repository->find( $id))
        return redirect()->back();

        return     view('Admin.pages.complains.show', compact('complain'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$complain =  $this->repository->find( $id))
        return redirect()->back();

        return view('Admin.pages.complains.edit', compact('complain'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUpdateComplain $request, $id)
    {

        if (!$complain =  $this->repository->find( $id))
        return redirect()->back();

        $data = $request->only(['status']);

        if ($request->comment) {
            $data['comment'] = $request->comment;
        }

        $complain->update($request->all());
        return redirect()->route('complains.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$complain =  $this->repository->find( $id))
        return redirect()->back();
        $complain->delete();
        return redirect()->route('complains.index');
    }
    public function search(Request $request)
    {

        $filters = $request->only('filter');
        $complains =  $this->repository
                        ->where(function($query) use ($request){
                            if($request->filter){
                                $query->where('name', $request->filter)
                                ->orWhere('description', 'LIKE', "%{$request->filter}%");
                            }
                        })->paginate();

        return view('Admin.pages.complains.index', compact('filters', 'complains'));
    }
/**
 * Altera o estado da reclamação
 */
    public function alter(Request $request, $id)
    {
        // dd($request->all());

            // dd($request['Em Processo']);
        if (!$complain =  $this->repository->find( $id))
        return redirect()->back();
            $status= $request['process'];
            // dd( $request['status']);
        $complain->update($status);
        return redirect()->route('complains.index');
    }
}
