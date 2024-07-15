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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female']);
            $table->date('dor');
            $table->enum('plan', ['one_month', 'three_months', 'six_months', 'one_year']);
            $table->string('contact_number');
            $table->string('address');
            $table->enum('service', ['fitness', 'sauna', 'cardio']);
            $table->decimal('total_amount', 8, 2);
            $table->boolean('expired')->default(false)->after('plan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
