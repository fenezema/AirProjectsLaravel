<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('projecttype_id')->unsigned();
            $table->foreign('projecttype_id')->references('id')->on('project_types');
            $table->string('pname');
            $table->text('pdescription');
            $table->string('pprice');
            $table->string('pduration');
            $table->string('pstatus');
            $table->string('pketerangan')->nullable();
            $table->string('purl')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
