<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('language_id')->unsigned()->index();
            $table->string('key', 255)->index();
            $table->longText('content')->nullable();
            $table->timestamps();

            $table->foreign('language_id')->references('id')->on('languages')->onDelete('CASCADE')->onUpdate('NO ACTION');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language_translations');
    }
}
