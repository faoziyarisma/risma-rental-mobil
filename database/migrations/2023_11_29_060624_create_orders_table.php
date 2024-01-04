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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('')
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('mobil_id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->double('tarif',12,2);
            $table->boolean('status_sewa')->default(false);
            $table->timestamps();

            // Menambahkan foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('mobil_id')->references('id')->on('mobils')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
