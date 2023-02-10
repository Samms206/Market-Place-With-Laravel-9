<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'buyer_id','product_id','qty','grand_total','date'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'id', 'product_id');
    }
}
