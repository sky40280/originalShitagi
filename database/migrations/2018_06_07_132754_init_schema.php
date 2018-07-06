<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitSchema extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->comment('姓名');
            $table->string('email', 255)->comment('信箱')->unique();
            $table->text('password')->comment('密碼');
            $table->enum('gender', ['MALE', 'FEMALE'])->default('MALE')->comment('性別');
            $table->string('mobile', 15)->nullable()->comment('手機');
            $table->string('city', 15)->nullable()->comment('城市');
            $table->string('district', 15)->nullable()->comment('區域');
            $table->string('address', 15)->nullable()->comment('地址');
            $table->boolean('email_verify')->default(0)->comment('信箱驗證狀態');
            $table->boolean('mobile_verify')->default(0)->comment('手機驗證狀態');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullalbe()->comment('品名');
            $table->integer('price')->default(0)->comment('價格');
            $table->text('description')->nullalbe()->comment('描述');
            $table->string('material', 255)->nullalbe()->comment('材質');
            $table->boolean('status')->comment('狀態');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->comment('users.id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('vi_products_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable()->comment('orders.id');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('product_id')->unsigned()->nullable()->comment('products.id');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('vi_products_orders');
        Schema::dropIfExists('users');
        Schema::dropIfExists('products');
        Schema::dropIfExists('orders');
    }
}
