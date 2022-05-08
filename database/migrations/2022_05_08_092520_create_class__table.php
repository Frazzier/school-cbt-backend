<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained()->references('id')->on('departments')->onDelete('cascade');
            $table->foreignId('homeroom_teacher_id')->nullable()->constrained()->references('id')->on('teachers')->onDelete('set null');
            $table->enum('degree', ['x','xi','xii']);
            $table->string('name', 15);
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
        Schema::dropIfExists('class_');
    }
}
