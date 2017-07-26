@extends('layouts.app')

@section('content')

<div class="jumbotron">
    <h1 class="text-center">Open Orders</h1>
    <ul class="nav nav-pills center-block">
      <li role="presentation" class="active center-block text-center"><a href="/orders">Open Orders</a></li>
    </ul>
</div>
<div class="container open-orders-content">
    <div class="row">
        <div class="col-sm-12">
            <form method="POST" action="/orders/1">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-8" style="padding: 0">
                        <textarea onfocus="typingChecker(true)" onblur="typingChecker(false)" 
                            name="message" id="message" cols="30" 
                            rows="6" class="form-control">@if (isset($message->message_board)){{ $message->message_board }}@endif</textarea>
                    </div>
                    <div id="notes-button-container" class="col-lg-2 col-md-2 col-sm-2 col-xs-4" style="padding: 0">
                        <button id="notes-button" class="btn btn-primary text-center" type="submit">Update<br>Notes</button>
                    </div>
                </div>
            </form>
        </div>          
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-12">
            <ul class="list-group">
                @foreach($orders as $order)

                    <?php

                        //check if any products have solar vents
                        $regexp = '/[RA][BFS]?[SF][F]?/';

                        $products = [];
                        $afterFirstLine = false;
                        foreach ($allData as $item){

                            if ($afterFirstLine){
                                if($item->number == ''){
                                    $products[] = $item;
                                }else {
                                    break;
                                }
                            }

                            if ($item->number == $order->number){
                                $products[] = $item;
                                $afterFirstLine = true;
                            }
                        }

                        $products = collect($products);

                        // First() will return true if it can find at least one item that's true
                        $hasSolarVents = $products->first(function($item) use($regexp){
                            return preg_match($regexp, $item['item']);
                        });

                        // First() will return true if it can find at least one item that's true
                        $hasPaintedVents = $products->first(function($item) use($regexp){
                            return $item['ral'] != '';
                        });

                        //checking if a single order has an image, and if so add message icon
                        $message = json_decode(\App\Order::find($order->number), true);
                        $message = $message['message_board'];
                        $hasMessage = strlen($message) > 0;
                        $isCreditCardOrder = $order->ci == "C";
                    ?>
                    <a href="/orders/{{ $order->number }}">
                        <li class="list-group-item">
                            {{ substr($order->customer, 0, 22) . "..." }}
                            {!! $hasMessage ? '<i class="fa fa-comment-o"></i>' : '' !!}
                            {!! $hasSolarVents ? '<i class="fa fa-sun-o"></i>' : '' !!}
                            {!! $hasPaintedVents ? '<i class="fa fa-paint-brush"></i>' : '' !!}
                            {!! $isCreditCardOrder ? '<i class="fa fa-credit-card"></i>' : '' !!}
                            <span class="badge">{{ $order->number }}</span>
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
{{-- <pre> --}}
<?php //var_dump($orders); ?>
{{-- </pre> --}}
        </div>
    </div>
</div>



@endsection




@section('custom-scripts')
    <script>
        //auto_refresh();
    </script>
@endsection
