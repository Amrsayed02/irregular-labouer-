<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            // $table->integer('client_id');
            // $table->integer('worker_id');
            $table->boolean('status');
            $table->float('price');
            $table->foreignId('client_id')->constrained('clients')->cascadeOnDelete();
            $table->foreignId('worker_id')->constrained('workers')->cascadeOnDelete();
            // $table->foreign('client_id')->references('id')->on('clients')-> cascadeOnDelete();
            // $table->foreign('worker_id')->references('id')->on('workers')-> cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
