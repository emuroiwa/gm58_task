<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('issue_type')->unsigned()->nullable();
            $table->string('key');
            $table->string('subject');
            $table->longText('description');
            $table->integer('assignee')->unsigned()->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->integer('priority')->unsigned()->nullable();
            $table->integer('registed_by')->unsigned()->nullable();
            $table->dateTime('due_date');
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
        Schema::dropIfExists('tasks');
    }
}
