<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreignId('category_id');

            //外部キー制約
            $table->foreign('post_id')
                ->references('id')
                ->on('posts');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            
            // 外部キー２つを複合主キー
            $table->primary(['post_id','category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_category');
    }
};
