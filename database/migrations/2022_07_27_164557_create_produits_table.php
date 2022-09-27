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
        Schema::create('produits', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nom')->unique();
            // $table->string('description',255);
            $table->longText('description');
            $table->decimal('prix');
            $table->string('image');
            $table->unsignedBigInteger("categorie_id");
            $table->timestamps();
            $table->foreign('categorie_id')->references('id')
            ->on('categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
};
