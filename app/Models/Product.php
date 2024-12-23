<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify the table name if it differs from the default
    protected $table = 'products';

    // Specify the primary key if it differs from `id`
    protected $primaryKey = 'product_id';

    // Indicate whether the primary key is auto-incrementing
    public $incrementing = true;

    // Specify the primary key data type
    protected $keyType = 'int';

    // Specify fillable fields for mass assignment
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'customer_id',
        'image',
    ];

    /**
     * Define the many-to-many relationship with the Customer model.
     */
    public function scopeFindProduct($query, $id)
    {
        return $query->find($id);
    }

    public function scopeWithRelationship($query, $relationship, $conditions = [])
    {
        return $query->whereHas($relationship, function ($query) use ($conditions) {
            foreach ($conditions as $key => $value) {
                $query->where($key, $value);
            }
        });
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class,  'customer_id');
    }

}
