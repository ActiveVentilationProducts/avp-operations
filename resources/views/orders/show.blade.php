@extends('layouts.app')

@section('content')

<div class="jumbotron">
	<h1 class="text-center">Order: {{ $order->first()['number'] }}</h1>
	<p class="text-center">Customer: {{ $order->first()['customer'] }}</p>
	<p class="text-center">Received: {{ app()->make('CsvParser')->excelDateToHumanReadable($order->first()['recd']) }}</p>
	<p class="text-center">Ship Date:
	@if ($order->first()->date !== null) 
		{{ app()->make('CsvParser')->excelDateToHumanReadable($order->first()['date']) }}</p>
	@endif
	<ul class="nav nav-pills center-block">
	  <li role="presentation" class="active center-block text-center"><a href="/orders">Open Orders</a></li>
	</ul>
</div>
<div class="container open-orders-content">
	
	<div class="row">
		<div class="col-sm-12">
			<form method="POST" action="/orders/{{ $order->first()['number']}}">
				{{ method_field('PATCH') }}
				{{ csrf_field() }}
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-8" style="padding: 0">
					<textarea onfocus="typingChecker(true)" onblur="typingChecker(false)"
							name="message" id="message" cols="30" 
							rows="6" class="form-control">@if (isset($message->message_board)){{ $message->message_board }}@endif</textarea>
				</div>
				<div id="notes-button-container" class="col-lg-2 col-md-2 col-sm-2 col-xs-4" style="padding: 0">
					<button id="notes-button" class="btn btn-primary text-center" type="submit">Update<br>Notes</button>
				</div>
			</form>
		</div>			
	</div>
	<div class="row">
		<div class="col-sm-12">
			<ul class="list-group">
				@foreach($order as $line)
			  		<li class="list-group-item">
			  			{{ $line->item }} 

			  		<span class="badge">QTY: {{ $line->qty }}</span>

			  			@if ($line->ral != '')

				  			<span class="badge">
				  				<i class="fa fa-paint-brush"></i> {{ $line->remarks }}
				  				&nbsp;&nbsp;&nbsp;|
				  			</span>
				  		@endif
			  		</li>
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