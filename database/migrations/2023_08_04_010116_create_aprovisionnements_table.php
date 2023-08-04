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
        Schema::create('aprovisionnements', function (Blueprint $table) {
            $table->id("id_approvisionnement");
            $table->dateTime("dateApprovisionnement");
            $table->dateTime("dateExpiration");
            $table->integer("quantite");
            $table->float("pu");
            $table->float("prix");
            $table->foreignId('id_produit')->references("id_produit")->on("produits");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aprovisionnements');
    }
};
