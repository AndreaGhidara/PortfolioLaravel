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
        Schema::table('projects', function (Blueprint $table) {
            //Creo una colonna come intero non segnato
            // $table->unsignedBigInteger('language_id');
            //rengo la colonna una foreign key
            // $table->foreignId('language_id')->references('id')->on('languages');

            $table->foreignId('language_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            //eliminazione della key sulla colonna
            $table->dropForeign('projects_language_id_foreign');

            $table->dropColumn('language_id');
        });
    }
};
