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
        Schema::disableForeignKeyConstraints();

        Schema::create('characters', function (Blueprint $table) {
            $table->id()->foreign('group_invites.character_id');
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->unsignedTinyInteger('magic');
            $table->unsignedTinyInteger('strengh');
            $table->unsignedTinyInteger('agility');
            $table->unsignedTinyInteger('intelligence');
            $table->unsignedTinyInteger('life_points');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('characters_types');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
