<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\storeUpdateProduct;

class ProductController extends Controller
{
    protected $repository;

    public function __construct(Product $product)
    {
        $this->repository =$product;
        $this->middleware(['can:products']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  $this->repository->paginate();

        return view('Admin.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.products.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUpdateProduct $request)
    {

        $product = $this->repository;
       $product->create($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$product =  $this->repository->find( $id))
        return redirect()->back();

        return     view('Admin.pages.products.show', compact('product'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!$product =  $this->repository->find( $id))
        return redirect()->back();

        return view('Admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storeUpdateProduct $request, $id)
    {
        if (!$product =  $this->repository->find( $id))
        return redirect()->back();

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$product =  $this->repository->find( $id))
        return redirect()->back();
        $product->delete();
        return redirect()->route('products.index');
    }
    public function search(Request $request)
    {

        $filters = $request->only('filter');
        $products =  $this->repository
                        ->where(function($query) use ($request){
                            if($request->filter){
                                $query->where('name', $request->filter)
                                ->orWhere('description', 'LIKE', "%{$request->filter}%");
                            }
                        })->paginate();

        return view('Admin.pages.products.index', compact('filters', 'products'));
    }
}
