<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNtenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ntender', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ntcategory_id')->unsigned();
            $table->longText('title');
            $table->string('original_filename')->nullable();
            $table->string('file_extension')->nullable();
            $table->float('file_size')->nullable();
            $table->longText('url')->nullable();
            $table->timestamp('expired_at');
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
        Schema::dropIfExists('ntender');
    }
}
