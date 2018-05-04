<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustment_salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('AdjustmentTime')->comment('调整薪资时间');
            $table->float('BeforeSalary')->comment('薪资调整前');
            $table->float('AfterSalary')->comment('薪资调整后');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('adjustment_salaries');
    }
}
