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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignID('promotion_id')->constrained();
            $table->foreignID('category_id')->constrained();
        });
        Schema::table('product_details', function (Blueprint $table) {
            $table->foreignID('product_id')->constrained();
            $table->foreignID('size_id')->constrained();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreignID('product_detail_id')->constrained();
        });
        Schema::table('feedbacks', function (Blueprint $table) {
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreignID('product_detail_id')->constrained();
            $table->foreignID('comment_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->foreignID('product_detail_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->foreignID('payment_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreignID('product_detail_id')->constrained();
            $table->foreignID('invoice_id')->constrained();
        });
        Schema::table('favorites', function (Blueprint $table) {
            $table->foreignID('product_detail_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignID('product_detail_id')->constrained();
            $table->foreignID('user_id')->constrained();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
