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
        Schema::create('dpt_banner', function (Blueprint $table) {
            $table->id();
            $table->string("name",1000);
            $table->string("image",1000);
            $table->string("link",1000);
            $table->unsignedInteger("sort_order")->default(1);
            $table->string("position",50);
            $table->string("description",1000)->nullable();
            $table->unsignedInteger("created_by")->default(1);
            $table->unsignedInteger("updated_by")->nullable();
            $table->unsignedTinyInteger("status")->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpt_banner');
    }
};
