<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_id")->index();
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("CASCADE");

            $table->unsignedBigInteger("tag_id")->index();
            $table->foreign("tag_id")->references("id")->on("tags")->onDelete("CASCADE");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
};
