<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->date('loaned_at')->nullable();
            $table->date('due_at');
            $table->date('returned_at')->nullable();
            $table->enum('status',['reserved','borrowed','returned'])->default('borrowed');
            $table->timestamps();
        });
    }
    public function down() { Schema::dropIfExists('loans'); }
};
