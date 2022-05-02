<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("description");
            $table->longText("content");
            $table->timestamps();
        });

        Schema::table("posts", function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
