<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string("path");
            $table->timestamps();
        });

        Schema::table("images", function (Blueprint $table) {
            $table->unsignedBigInteger("post_id")->nullable();
            $table->foreign("post_id")->references("id")->on("posts");
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
};
