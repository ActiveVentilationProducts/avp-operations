<?php

namespace App\Helpers;

use App\Helpers\Contracts\ParserContract;

class DepotParser implements ParserContract
{
	public function parseOrders(){
		return 'parsing home depot orders';
	}
}
