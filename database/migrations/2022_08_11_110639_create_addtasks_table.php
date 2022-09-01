<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddtasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::create('addtasks', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('agency');
            $table->text('area');
            $table->text('district');
            $table->date('date');
            $table->text('BusinessType');
            $table->text('extraservices');
            $table->integer('AdminId');
            $table->text('status')->default('unassigned');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addtasks');
    }
}
