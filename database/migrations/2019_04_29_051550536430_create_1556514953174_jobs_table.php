<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1556514953174JobsTable extends Migration
{
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employer_id');
            $table->foreign('employer_id')->references('id')->on('users');
            $table->unsignedInteger('candidate_id')->nullable();
            $table->foreign('candidate_id')->references('id')->on('users');
            $table->string('title');
            $table->longText('description');
            $table->string('budget');
            $table->date('delivery_date')->nullable();
            $table->datetime('hired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
