<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name');
            $table->string('staff_occupation');
            $table->boolean('staff_status')->default(false);
            $table->string('staff_instagram')->nullable();
            $table->string('staff_twitter')->nullable();
            $table->string('staff_linkedin')->nullable();
            $table->string('staff_image')->nullable();
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
        Schema::dropIfExists('staff');
    }
};
