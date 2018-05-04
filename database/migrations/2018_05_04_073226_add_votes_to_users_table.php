<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->string('phone')->default('')->comment('电话号码');
            $table->string('sex')->default('')->comment('性别');
            $table->time('birth')->comment('出生');
            $table->string('school')->default('')->comment('毕业学校');
            $table->string('major')->default('')->comment('专业');
            $table->time('goTime')->comment('毕业时间');
            $table->string('NativePlace')->default('')->comment('籍贯');
            $table->time('BeginWorkTime')->comment('就职时间');
            $table->time('FormalWorker')->comment('转正时间');
            $table->string('company')->default('')->comment('公司');
            $table->string('UserID')->default('')->comment('身份证号码');
            $table->string('OpeningBank')->default('')->comment('开户行');
            $table->string('CardNum')->default('')->comment('银行卡号');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
