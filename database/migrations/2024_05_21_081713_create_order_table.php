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
        Schema::create('dpt_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->string("name");
            $table->string("email");
            $table->string("phone");
            $table->string("address");
            $table->string("note")->nullable();
            $table->unsignedInteger("updated_by")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dpt_order');
    }
};
