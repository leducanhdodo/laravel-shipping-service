<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['phone', 'address'];

    /**
     * One order has many items
     *
     * @return HasMany
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
