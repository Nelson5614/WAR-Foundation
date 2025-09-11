<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');
            $table->string('photo')->nullable();
            $table->string('department');
            $table->text('bio')->nullable();
            $table->timestamps();
            
            // Add soft deletes
            $table->softDeletes();
            
            // Add unique composite index on email and deleted_at to ensure no duplicate active email addresses
            $table->unique(['email', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the unique index first
        Schema::table('staff', function (Blueprint $table) {
            // Drop the unique index if it exists
            $sm = Schema::getConnection()->getDoctrineSchemaManager();
            $indexes = $sm->listTableIndexes($table->getTable());
            
            foreach ($indexes as $name => $index) {
                if (count($index->getColumns()) === 2 && 
                    in_array('email', $index->getColumns()) && 
                    in_array('deleted_at', $index->getColumns())) {
                    $table->dropIndex($name);
                    break;
                }
            }
            
            // Drop the foreign key constraint if it exists
            $foreignKeys = Schema::getConnection()
                ->getDoctrineSchemaManager()
                ->listTableForeignKeys($table->getTable());
                
            $foreignKeyName = array_reduce($foreignKeys, function($carry, $foreignKey) {
                return $carry ?: (in_array('user_id', $foreignKey->getLocalColumns()) ? $foreignKey->getName() : null);
            }, null);
            
            if ($foreignKeyName) {
                $table->dropForeign($foreignKeyName);
            }
        });
        
        // Finally drop the table
        Schema::dropIfExists('staff');
    }
};
