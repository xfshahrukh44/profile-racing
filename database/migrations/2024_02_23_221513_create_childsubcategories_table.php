<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChildsubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('childsubcategories')) {
            Schema::create('childsubcategories', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('subcategory')->nullable();
                $table->string('childsubcategory')->nullable();
                });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('childsubcategories');
    }
}
