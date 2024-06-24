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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',100);
            $table->string('fullname',255);
            $table->string('phonenumber',10)->nullable();
            $table->string('email',200)->unique();
            $table->string('address',255)->nullable();
            $table->text('image')->nullable();
            $table->string('password');
            $table->integer('token')->nullable();
            $table->boolean('role')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
