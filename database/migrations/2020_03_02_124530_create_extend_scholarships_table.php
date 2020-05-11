<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtendScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extend_scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('number_for_extend');
            $table->unsignedBigInteger('user_id');
            $table->string('other_reason', 200)->nullable();
            $table->unsignedSmallInteger('scholarship_reason_id');
            $table->unsignedSmallInteger('register_scholarship_id');
            $table->unsignedSmallInteger('status_id')->default(3);
            $table->string('reject_reason')->nullable();
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
        Schema::dropIfExists('extend_scholarships');
    }
}
