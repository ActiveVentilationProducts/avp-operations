<?php

namespace App\Helpers\Contracts;

interface ParserContract
{
	public function parseOrders();
	public function getOpenOrders();
	public function getSingleOrder(int $orderNumber);
}