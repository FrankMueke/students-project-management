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
            $table->unsignedBigInteger('course_id')->after('email')->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('classroom_id')->after('course_id')->nullable();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onDelete('cascade');

            $table->unsignedBigInteger('supervisor_id')->after('classroom_id')->nullable();
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade');
            

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
