<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->comment("1:India")->default("1")->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('zone_id');
            $table->string('city_name',50);
            $table->unsignedTinyInteger('status')->comment("1:India")->default("1");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('cities');
    }
};
