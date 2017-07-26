<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_number';
    protected $fillable = ['order_number', 'message_board'];
}
