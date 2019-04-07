<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['name', 'price', 'type', 'height', 'width', 'depth', 'weight', 'order_id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
