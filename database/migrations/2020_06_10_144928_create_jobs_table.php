<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('advisor_id');
        //    $table->string('category_id')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
        //    $table->text('roles')->nullable();
        //    $table->string('position')->nullable();
        //    $table->string('address')->nullable();
        //    $table->string('type')->nullable();
            $table->integer('status');
        //    $table->date('deadline')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
