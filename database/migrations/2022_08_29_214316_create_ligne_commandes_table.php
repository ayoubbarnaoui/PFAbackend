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
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("commande_id");
            $table->unsignedBigInteger("produit_id");
            $table->decimal('prix_total');
            $table->integer('quantite');
            $table->timestamps();
            $table->foreign('commande_id')->references('id')
            ->on('commandes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produit_id')->references('id')
            ->on('produits')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_commandes');
    }
};
