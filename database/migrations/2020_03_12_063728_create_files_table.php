<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('path');
            $table->string('register_scholarship_id')->nullable();
            $table->string('cancel_scholarship_id')->nullable();
            $table->string('extend_scholarship_id')->nullable();
            $table->string('change_supervisor_scholarship_id')->nullable();
            $table->string('language_scholarship_id')->nullable();
            $table->string('change_fellowship_scholarship_id')->nullable();
            $table->string('user_id');
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
        Schema::dropIfExists('files');
    }
}
