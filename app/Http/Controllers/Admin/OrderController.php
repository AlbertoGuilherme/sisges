<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Complain;
use App\Http\Requests\storeUpdateOrder;

class OrderController extends Controller
{
    protected $repository;

    public function __construct(Order $order, Product $product, Complain $complain)
    {
        $this->repository =$order;
        $this->product =$product;
        $this->complain =$complain;
        $this->middleware(['can:orders']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $qtyCaraceters = 8)
    {

        $orders =  $this->repository->paginate();
        $ordersAd =  $this->repository->paginate();
        $products = $this->product;

      $orders = auth()->user()->orders;

        return view('Admin.pages.orders.index', compact(['orders', 'products', 'ordersAd']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.orders.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUpdateOrder $request)
    {
        dd($request->all());
        $order = $this->repository;
       $order->create($request->all());
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$order =  $this->repository->find( $id))
        return redirect()->back();

        return     view('Admin.pages.orders.show', compact('order'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$order =  $this->repository->find( $id))
        return redirect()->back();

        return view('Admin.pages.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUpdateOrder $request, $id)
    {

        if (!$order =  $this->repository->find( $id))
        return redirect()->back();

        $data = $request->only(['status']);
        // dd($data);
        if ($request->reup) {
            $data['reup'] = $request->reup;
        }

        $order->update($request->all());
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$order =  $this->repository->find( $id))
        return redirect()->back();
        $order->delete();
        return redirect()->route('orders.index');
    }
    public function search(Request $request)
    {

        $filters = $request->only('filter');
        $orders =  $this->repository
                        ->where(function($query) use ($request){
                            if($request->filter){
                                $query->where('name', $request->filter)
                                ->orWhere('description', 'LIKE', "%{$request->filter}%");
                            }
                        })->paginate();

        return view('Admin.pages.orders.index', compact('filters', 'orders'));
    }

    public function alter(Request $request, $id)
    {
        // dd($request->all());

            // dd($request['Em Processo']);
        if (!$order =  $this->repository->find( $id))
        return redirect()->back();
            $status= $request['process'];
            // dd( $request['status']);
        $order->update($status);
        return redirect()->route('orders.index');
    }

    /**
     * Show all states
     */

     public function states ()
     {
         $ordersUserProce = $this->repository->where('status', 'processando')->paginate(4);
         $ordersUserCompl = $this->repository->where('status', 'concluído')->paginate();
         $ordersOpen = $this->repository->where('status', 'aberto')->paginate(4);
         $complainTotal =  $this->complain->where('status', 'aberto')->paginate(4);
         /**
          * user processing
          */
          $complains= $this->complain;
          $orders = $this->repository;
         $complainUser = auth()->user()->complains->where('status', 'processando');
         $ordersUser = auth()->user()->orders->where('status', 'processando');
         return view('admin.pages.orders.states', compact(
             'ordersUserProce', 
             'ordersUserCompl',
              'ordersOpen',
               'complainTotal',
               'complainUser',
               'ordersUser'
            ));
     }
}
