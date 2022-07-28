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
            $table->string('umur');
            $table->string('berat_badan');
            $table->string('hiv');
            $table->string('pasangan_hiv');
            $table->string('kontak_hepatitis');
            $table->string('suntik');
            $table->string('riwayat_donor');
            $table->string('sex_period');
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
