<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlretMyErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('my_errors' , function (Blueprint $table){
           $table->text('error_fix')->nullable()->change();
       });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_errors' , function (Blueprint $table){
            $table->text('error_fix')->nullable(false)->change();
        });
    }
}
