<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeFellowshipScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_fellowship_scholarships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('other_reason', 200)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('scholarship_reason_id');
            $table->unsignedSmallInteger('fellowship_id')->nullable();
            $table->unsignedSmallInteger('register_scholarship_id');
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
        Schema::dropIfExists('change_fellowship_scholarships');
    }
}
