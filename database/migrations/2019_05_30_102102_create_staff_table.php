<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->integer('user_id')->index()->unsigned()->nullable();
            $table->integer('position_id')->index()->unsigned();
            $table->integer('photo_id')->nullable()->unsigned();
            $table->integer('salary')->index()->unsigned();
            $table->integer('parent_id')->index()->unsigned()->nullable();
            $table->timestamp('started_at')->index();
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
        Schema::dropIfExists('staff');
    }
}
