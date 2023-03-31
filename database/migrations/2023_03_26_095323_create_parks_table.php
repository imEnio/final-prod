<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('parks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("city_id");
            $table->string("title", 255);
            $table->text("logo")->nullable();
            $table->text("image")->nullable();
            $table->text("description")->nullable();
            $table->text("address");
            $table->text("subway")->nullable();
            $table->text("phone")->nullable();
            $table->text("web")->nullable();
            $table->double("square");
            $table->text("time_zone");
            $table->double("avg_price");
            $table->timestamps();
            $table->foreign("city_id")->references("id")->on("cities")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parks');
    }
};
