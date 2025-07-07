<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sublevel', function (Blueprint $table) {
            $table->id();
            $table->char("code", 4);
            $table->string('name', 50);
            $table->foreignId('level_id');

            $table->foreign("level_id")
                ->references("id")
                ->on("level");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("sublevel", function (Blueprint $table) {
            $table->dropForeign(["level_id"]);
        });

        Schema::dropIfExists('sublevel');
    }
};
