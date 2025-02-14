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
            // $table->integer('client_id');
            // $table->integer('worker_id');
            $table->string('send_message');
            $table->string('receive_message');
            $table->string('edit_message');
            $table->string('message_status');
            $table->foreignId('worker_id')->constrained('workers')->cascadeOnDelete();
            // $table->foreign('client_id')->references('id')->on('chats')-> cascadeOnDelete();
           
            // $table->foreign('worker_id')->references('id')->on('chats')-> cascadeOnDelete();
            
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
