<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('category');
            $table->string('authors')->nullable();
            $table->string('primary_author')->nullable();
            $table->string('co_author1')->nullable();
            $table->string('co_author2')->nullable();
            $table->string('co_author3')->nullable();
            $table->string('co_author4')->nullable();
            $table->string('co_author5')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->string('journal')->nullable();
            $table->string('publisher')->nullable();
            $table->string('conference')->nullable();
            $table->string('book')->nullable();
            $table->string('volume')->nullable();
            $table->string('issue')->nullable();
            $table->string('pages')->nullable();
            $table->date('publication_date')->nullable();
            $table->string('institution')->nullable();
            $table->string('inventors')->nullable();
            $table->string('patent_office')->nullable();
            $table->string('patent_number')->nullable();
            $table->string('application_number')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
