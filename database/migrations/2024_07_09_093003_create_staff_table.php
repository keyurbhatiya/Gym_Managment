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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname'); // Ensure lastname column is defined
            $table->string('username')->unique();
            $table->enum('gender', ['Male', 'Female']);
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('contact');
            $table->string('password'); // Ensure password column is defined
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
