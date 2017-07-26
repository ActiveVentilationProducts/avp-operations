<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\MessageBoardUpdated;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ToDO inventory auth
        if (Auth::user()->name == 'roofvents')
            {
                $parser = app()->make('CsvParser');
                $message = \App\Order::find(1);
                $orders = $parser->getOpenOrders();
                $allData = $parser->parseOrders();
                return view('orders.index', compact('orders', 'message', 'allData', 'parser'));
            }
        else
            {
               return redirect('/');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ToDo inventory section authorizations
        if (Auth::user()->name == 'roofvents')
            {
                $message = \App\Order::find($id);
                $order = app()->make('CsvParser')->getSingleOrder($id);
                return view('orders.show', compact('order', 'message'));
            }
            else
            {
                return redirect('/');
            } 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \App\Order::updateOrCreate(['order_number' => $id]);

        $order = \App\Order::find($id);

        $order->message_board = $request->message;
        
        $order->update();

        \Mail::to('operations@roofvents.com')->send(new MessageBoardUpdated($order));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
