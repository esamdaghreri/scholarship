<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('country_id');
            $table->unsignedSmallInteger('university_id');
            $table->unsignedSmallInteger('college_id');
            $table->unsignedSmallInteger('degree_id');
            $table->integer('university_order');
            $table->unsignedSmallInteger('specialist_id');
            $table->json('attachment');
            $table->unsignedBigInteger('created_by');
            $table->dateTime('created_at')->useCurrent();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('university_id')->references('id')->on('university');
            $table->foreign('college_id')->references('id')->on('college');
            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->foreign('specialist_id')->references('id')->on('specialists');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_scholarships');
    }
}
