<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_id')->references('id')->on('types')->onDelete('cascade')->constrained();
            $table->decimal('price', 10);
            $table->decimal('original_price', 10);
            $table->longText('description');
            $table->string('photo');
            $table->timestamps();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('rating');
            $table->longText('message');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->constrained();
            $table->foreignId('menu_id')->references('id')->on('menus')->onDelete('cascade')->constrained();
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->constrained();
            $table->foreignId('menu_id')->references('id')->on('menus')->onDelete('cascade')->constrained();
            $table->integer('quantity');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->constrained();
            $table->decimal('total_price', 10);
            $table->string('payment_method');
            $table->string('address');
            $table->string('status');
            $table->foreignId('employee_id')->references('id')->on('users')->onDelete('cascade')->constrained();
            $table->timestamps();
        });

        Schema::create('order_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('orders')->onDelete('cascade')->constrained();
            $table->foreignId('menu_id')->references('id')->on('menus')->onDelete('cascade')->constrained();
            $table->integer('quantity');
            $table->decimal('order_price', 10);
            $table->timestamps();
        });

        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('discount');
            $table->date('start_day');
            $table->date('end_day');
            $table->Time('start_time');
            $table->Time('end_time');
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('promo_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promo_id')->references('id')->on('promos')->onDelete('cascade')->constrained();
            $table->foreignId('menu_id')->references('id')->on('menus')->onDelete('cascade')->constrained();
            $table->timestamps();
        });

        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->time('open_hour');
            $table->time('close_hour');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outlet');
        Schema::dropIfExists('promo_menu');
        Schema::dropIfExists('promos');
        Schema::dropIfExists('order_menu');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('carts');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('types');
        Schema::dropIfExists('users');
    }
};
