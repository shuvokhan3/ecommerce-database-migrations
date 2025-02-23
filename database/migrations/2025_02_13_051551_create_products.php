<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();//primary key
            $table->string('title',100);
            $table->string('short_des',200);
            $table->string('price',50);
            $table->tinyInteger('discount');
            $table->string('discount_price',50);
            $table->string('image',100);
            $table->tinyInteger('stock');
            $table->double('star');
            $table->enum('remark',['Featured','BestSell','popular','hotOffer']);

            //foreign key
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');

            //category_id coloum set relation with categories table id coloum
            $table->foreign('category_id')->references('id')->on('categories')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('brand_id')->references('id')->on('brands')->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
