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
        Schema::create('estados', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id'
            $table->string('nome'); // Nome do estado
            $table->string('uf', 2); // Sigla do estado (ex: SP, RJ)
            $table->string('ibge', 2); // Sigla do estado (ex: SP, RJ)
            $table->string('pais', 5); // Sigla do estado (ex: SP, RJ)
            $table->string('dd', 5); // Sigla do estado (ex: SP, RJ)
            $table->timestamps(); // Created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estados');
    }
};
