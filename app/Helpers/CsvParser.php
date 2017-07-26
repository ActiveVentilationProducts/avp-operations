<?php

namespace App\Helpers;

use App\Helpers\Contracts\ParserContract;
use Excel;

class CsvParser implements ParserContract
{
	// return the entire collection of targeted data from csv
    public function parseOrders(){
    	$results = Excel::load(storage_path() . '/OpenOrders/Log - Open Orders-OPERATIONS.csv')
    		->skipRows(1)->takeColumns(11)->get();

    	$upToTheLastOrder = $results->search(function($item, $key){
    		return $item['number'] == '*';
    	});

    	return $results->take($upToTheLastOrder+1);
    }


    // list of unique orders without additional line items
    public function getOpenOrders(){
        $orders = $this->parseOrders();
        $orders->pop();
    	 return $orders->filter(function($value, $key){
    	 	return $value['number'] != null;
    	 });
    }


    // get single order and all of it's additional line items
    public function getSingleOrder(int $orderNumber)
    {
    	$openOrders = $this->parseOrders();

    	$start = $openOrders->search(function($item, $key) use($orderNumber){
    		return $item['number'] == $orderNumber;
    	});

    	$end = $openOrders->search(function($item, $key) use($orderNumber){
    		return $item['number'] > $orderNumber || $item['number'] == '*';
    	});

        $size = $end - $start;
        
    	return $this->parseOrders()->slice($start, $size);
    }

    static function excelDateToHumanReadable($excel_date){
        $unix = ($excel_date - 25569) * 86400;
        return gmdate("m-d-Y", $unix);
    }

}











