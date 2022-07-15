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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('path')->nullable();
            $table->string('ext')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('purpose')->nullable();
            $table->morphs('videoable');
            
            $table->unsignedBigInteger('storage_type_id')->nullable()->comment('storage system used, S3, Google, Local');
            $table->foreign('storage_type_id')->on('storage_types')->references('id');

            $table->softDeletes();
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
        Schema::dropIfExists('videos');
    }
};
