<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screanings', function (Blueprint $table) {
            $table->id();
            $table->boolean('sehat')->nullable();
            $table->boolean('minum_obat')->nullable();
            $table->boolean('demam')->nullable();
            $table->boolean('cabut_gigi')->nullable();
            $table->boolean('hiv')->nullable();
            $table->boolean('kontak_hepatitis')->nullable();
            $table->boolean('sex_period')->nullable();
            $table->boolean('riwayat_donor')->nullable();
            $table->boolean('sarapan')->nullable();
            $table->boolean('hamil')->nullable();
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
        Schema::dropIfExists('screaning');
    }
};
