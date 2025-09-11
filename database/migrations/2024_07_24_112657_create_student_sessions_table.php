<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_sessions', function (Blueprint $table) {
            $table->id();
            
            // Student information
            $table->unsignedBigInteger('student_id');
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            
            // Session details
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->integer('duration')->comment('in minutes');
            $table->time('end_time');
            $table->boolean('is_online')->default(false);
            $table->string('status')->default('pending');
            
            // Order field if needed for sorting
            $table->integer('order')->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            // Foreign key constraints
            $table->foreign('student_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_sessions');
    }
};
