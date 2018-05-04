<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->default(1)->comment('1:试用 2:实习 3: 转正 ');
            $table->float('FormalSalary')->comment('正式薪资');
            $table->float('TryoutSalary')->comment('试用薪资');
            $table->float('InternshipSalary')->comment('实习薪资');
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
        Schema::dropIfExists('salaries');
    }
}
