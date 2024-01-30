<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_id')->unique();
            $table->string('company_name')->nullable();
            $table->boolean('active')->default(true);
            $table->string('company_address1')->nullable();
            $table->string('company_address2')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_state')->nullable();
            $table->mediumInteger('company_zip')->nullable();
            $table->string('company_country')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
