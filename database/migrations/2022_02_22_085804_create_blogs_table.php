<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('posted_by');
            $table->foreign('posted_by')->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')
                ->on('blog_categories')
                ->onDelete('cascade');
            $table->unsignedBigInteger('thumbnail')->nullable()->index();
            $table->foreign('thumbnail')->references('id')
                    ->on('media')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('fullimage')->nullable()->index();
            $table->foreign('fullimage')->references('id')
                            ->on('media')
                            ->onDelete('cascade');
            $table->integer('clap')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
