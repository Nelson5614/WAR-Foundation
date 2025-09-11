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
        Schema::table('student_sessions', function (Blueprint $table) {
            $table->unsignedBigInteger('counselor_id')->nullable()->after('student_id');
            
            $table->foreign('counselor_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_sessions', function (Blueprint $table) {
            $table->dropForeign(['counselor_id']);
            $table->dropColumn('counselor_id');
        });
    }
};
