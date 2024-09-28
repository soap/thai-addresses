<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

return new class extends Migration
{
    public function up()
    {
        $table = ThaiAddresses::getGeographyTableName();
        Schema::create($table, function (Blueprint $table) {
            $table->id();

            $table->string('name_en');
            $table->string('name_th');
            $table->timestamps();
        });
    }

    public function down()
    {
        $table = ThaiAddresses::getGeographyTableName();
        Schema::dropIfExists($table);
    }
};
