<?php

use App\User;

use App\Models\Localisation;
use FontLib\Table\Type\loca;
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
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->string("logo");
            $table->longText("description");
            $table->string("jour_travail");
            $table->string("type_garage");
            $table->string("telephone_garage");
            $table->integer("nombre_mecanicien");
            $table->string("service_garage");
            $table->timestamps();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('garages');
    }
};
