<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Soap\ThaiAddresses\Facades\ThaiAddresses;

return new class extends Migration
{
    public function up()
    {
        Schema::create(ThaiAddresses::getAddressTableName(), function (Blueprint $table) {
            // Columns
            $table->id('id');
            $table->morphs('addressable');

            $table->string('given_name');
            $table->string('family_name');

            $table->string('label')->nullable();

            $table->string('organization')->nullable();
            $table->string('street')->nullable();
            $table->foreignId('subdistrict_id')->nullable();
            $table->string('postal_code')->nullable();

            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->boolean('is_primary')->default(false);
            $table->boolean('is_billing')->default(false);
            $table->boolean('is_shipping')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists(ThaiAddresses::getAddressTableName());
    }
};
