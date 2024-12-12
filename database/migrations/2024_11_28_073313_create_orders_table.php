<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('customer_id'); // Foreign key
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            // $table->decimal('total_amount', 10, 2);
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}
