<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentregisters', function (Blueprint $table) {
            $table->id();
            $table->text('fname');
            $table->text('lname');
            $table->text('country');
            $table->text('subcounty');
            $table->text('district');
            $table->text('village');
            $table->text('responsibility');
            $table->text('NIN');
            $table->text('national_id');
            $table->text('profile_photo');
            $table->text('languages');
            $table->text('email');
            $table->bigInteger('phonenumber');
            $table->text('status')->default('invalid');
            $table->text('password');
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
        Schema::dropIfExists('agentregisters');
    }
}
