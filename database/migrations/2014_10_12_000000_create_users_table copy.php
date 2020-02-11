<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('username')-unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name', 25)->nullable();
            $table->string('second_name', 25)->nullable();
            $table->string('third_name', 25)->nullable();
            $table->string('fourth_name', 25)->nullable();
            $table->string('fourth_name', 25)->nullable();
            $table->unsignedBigInteger('phone')->nullable();
            $table->unsignedBigInteger('telephone')->nullable();
            $table->unsignedBigInteger('national_number')->nullable();
            $table->unsignedBigInteger('save_number')->nullable();
            $table->dateTime('release_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->string('highest_qualification', 40)->nullable();
            $table->unsignedTinyInteger('role_id')->default('3');
            $table->unsignedSmallInteger('graduation_country_id')->nullable();
            $table->unsignedSmallInteger('graduation_university_id')->nullable();
            $table->unsignedSmallInteger('graduation_college_id')->nullable();
            $table->unsignedSmallInteger('degree_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->dateTime('created_at')->useCurrent();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->rememberToken();
            
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('graduation_country_id')->references('id')->on('countries');
            $table->foreign('graduation_university_id')->references('id')->on('university');
            $table->foreign('graduation_college_id')->references('id')->on('college');
            $table->foreign('degree_id')->references('id')->on('degrees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
