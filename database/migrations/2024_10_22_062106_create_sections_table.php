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
            Schema::create('sections', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->boolean('active')->default(true);
                $table->text('cards')->nullable();
                $table->text('title')->nullable();
                $table->text('text')->nullable();
                $table->text('link')->nullable();
                $table->text('img')->nullable();
                $table->timestamps();
            });

        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id');
            $table->string('action');
            $table->timestamps();
        });

    Schema::create('cards', function (Blueprint $table) {
        $table->id();
        $table->foreignId('section_id')->constrained()->onDelete('cascade');
        $table->string('title')->nullable();
        $table->text('text')->nullable();
        $table->text('icon')->nullable();
        //responsible admin record
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
        Schema::dropIfExists('admin_logs');
        Schema::dropIfExists('cards');
    }
};
