<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('introtitle')->nullable();
            $table->text('introdescription')->nullable();
            $table->integer('advertview')->nullable();
            $table->integer('follower')->nullable();
            $table->integer('likes')->nullable();
            $table->integer('comments')->nullable();
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('image')->nullable()->index();
            $table->foreign('image')->references('id')
                ->on('media')
                ->onDelete('cascade');
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
        Schema::dropIfExists('pages');
    }
}
