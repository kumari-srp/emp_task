<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeWebHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_web_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address');
            $table->string('url');
            $table->date('date');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_web_history');
    }
}
