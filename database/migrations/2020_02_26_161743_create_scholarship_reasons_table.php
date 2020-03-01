<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipReasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_reasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_en', 200);
            $table->string('name_ar', 200);
            $table->boolean('extend');
            $table->boolean('cancel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarship_reasons');
    }
}
