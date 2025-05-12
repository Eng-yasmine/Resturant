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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->decimal('salary',6,2)->default(3000.00);
            $table->enum('gender',['male','female']);
            $table->string('national_ID');
            $table->string('image')->default('default1.jpeg');
            $table->string('address');
            $table->date('date_of_birth');
            $table->date('start_date');
            $table->enum('position', ['chef','assistant_chef','master_chef','cashier','waiter','manager','security','cleaner','supervisor','delivery','receptionist','accountant']);
            // $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
