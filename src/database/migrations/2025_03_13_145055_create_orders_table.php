<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->enum('status', ['new', 'accepted'])->default('new');
            $table->text('comment')->nullable();
            $table->string('product_title');
            $table->unsignedInteger('product_price');
            $table->integer('product_count')->default(1);
            $table->foreignIdFor(Product::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (app()->isLocal()) {
            Schema::dropIfExists('orders');
        }
    }
};
