<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_name', 'quantity', 'price', 'total_amount', 'customer_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}


// class Order extends Model
// {
//     use HasFactory;

//     protected $table = 'orders';
//     protected $primaryKey = 'order_id';

//     protected $fillable = [
//         'customer_id',
//         'product_name',
//         'quantity',
//         'price',
//     ];

//     public function customer()
// {
//     return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
//     }

// }
