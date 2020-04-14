<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_districts', function (Blueprint $table) {
            $table->id();
            $table->string('name',60);
            $table->unsignedBigInteger('parent_id');
            $table->string('phone_extension',11);
            $table->foreign('parent_id')->references('id')->on('tbl_divisions');
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
        Schema::dropIfExists('tbl_districts');
    }
}
