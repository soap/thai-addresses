<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Soap\ThaiAddresses\ThaiAddresses;

return new class extends Migration
{
    public function up()
    {
        $table = ThaiAddresses::getDistrictTableName();
        Schema::create($table, function (Blueprint $table) {
            $table->id();

            // add fields
            $table->string('code');
            $table->string('name_th');
            $table->string('name_en');
            $table->foreignId(ThaiAddresses::getProvinceForeignKeyName());

            $table->timestamps();
        });
    }

    public function down()
    {
        $table = ThaiAddresses::getDistrictTableName();
        Schema::dropIfExists($table);
    }
};
