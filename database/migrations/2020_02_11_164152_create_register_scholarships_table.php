<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('country_id');
            $table->unsignedSmallInteger('university_id');
            $table->unsignedSmallInteger('college_id');
            $table->unsignedSmallInteger('qualification_id')->nullable();
            $table->unsignedSmallInteger('fellowship_id')->nullable();
            $table->unsignedSmallInteger('status_id')->default(3);
            $table->unsignedSmallInteger('registeration_type_id');
            $table->unsignedBigInteger('created_by');
            $table->dateTime('created_at')->useCurrent();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('register_scholarships');
    }
}
