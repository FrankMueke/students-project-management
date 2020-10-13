<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id')->after('email');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('classroom_id')->after('course_id');
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade')->nullable();

            $table->unsignedBigInteger('supervisor_id')->after('classroom_id');
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('course_id');
            $table->dropColumn('classroom_id');
            $table->dropColumn('supervisor_id');
        });
    }
}
