<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Customer extends Model implements Authenticatable
{
    use HasFactory,\Illuminate\Auth\Authenticatable;

    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
    ];

    /**
     * Define the relationship with the Order model (One-to-Many).
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }

    /**
     * Define the many-to-many relationship with the Product model.
     */
    public function products()
{
    return $this->belongsToMany(Product::class, 'customer_product', 'customer_id', 'product_id');
}

}
