<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Http\Requests\storeUpdateOrder;
use PDF;

class ProductOrderController extends Controller
{

    public function __construct(Product $product, Order $order)
    {
        $this->product =$product;
        $this->order =$order;

    }
    public function attachProductOrder(storeUpdateOrder $request , $idProduct, int $qtyCaraceters = 8)
    {
        // dd($request->all());

        $product =  $this->product->find($idProduct);
        // dd($product);
        $order = $this->order;
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        // $specialCharacters = str_shuffle('!@#$%*-');

        // $characters = $smallLetters.$numbers.$specialCharacters;
        $characters = $numbers;



        if (!$product)
        return redirect()->back();


        $data['user_id'] = auth()->user()->id;
        $data['own_name'] = auth()->user()->name;
        $data['identify'] = substr(str_shuffle($characters), 0, $qtyCaraceters);
        $data['total']  = $request->total;
        $data['status'] = "aberto";
        $data['comment'] =$request->name;
        $data['reup']=$request->reup;

        
       

      $order->products()->attach($request->product);

      $order->create($data);


$userId =  auth()->user()->id;
$userName = auth()->user()->name;
$total = $request->total;
$comment = $request->name;
$rup = $request->reup;

$identify = substr(str_shuffle($characters), 0, $qtyCaraceters);
//       $data = 
//       [
//         'user_id' =>"$userId",
//         'own_name' =>auth()->user()->name,
//         'identify'=> substr(str_shuffle($characters), 0, $qtyCaraceters),
//         'total' =>$request->total,
//         'status' => "aberto",
//         'comment'=>$request->name,
//         'reup' =>$request->reup,
//       ];
     
$data = ['title' => 'Welcome to ItSolutionStuff.com',
                'id' =>$userId,
                'own_name' =>$userName,
                'identify' => $identify,
                'total' => $total,
                'status' => 'aberto',
                'comment' => $comment,
                'reup' => $rup

            ];
$pdf = PDF::loadView('myPDF', $data);

return $pdf->stream('itsolutionstuff.pdf');
        
        //   return redirect()->route('orders.index');
    }
}
