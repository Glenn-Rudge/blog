<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text("content");
            $table->timestamps();
        });

        Schema::table("comments", function (Blueprint $table) {
            $table->unsignedBigInteger("post_id")->index();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("CASCADE");
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
