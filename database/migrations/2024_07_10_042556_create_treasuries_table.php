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
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('is_master')->comment('هل الخزنة زئيسية 0 - 1')->default(0);
            $table->bigInteger('last_receipt_exchange')->comment('اخر ايصال للصرف');
            $table->bigInteger('last_receipt_collect')->comment('اخر ايصال للصرف');
            $table->integer('added_by');
            $table->integer('updated_by');
            $table->integer('com_code');
            $table->date('date')->comment('for search');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treasuries');
    }
};
