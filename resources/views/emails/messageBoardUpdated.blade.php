<?php 
	$title = "New message from main orders page";
	$url = "http://operations.nori.cloud/orders";
	if ($order->order_number != 1){
		$title = "New message from order #: " . $order->order_number;
		$url = "http://operations.nori.cloud/orders/" . $order->order_number;
	}
?>




@component('mail::message')
# {{ $title }}

@component('mail::panel', ['url' => $url])
	{!! nl2br(e($order->message_board)) !!}
@endcomponent

@component('mail::button', ['url' => $url])
	Reply back to this message
@endcomponent

Thanks,<br>
Operations Bot
@endcomponent