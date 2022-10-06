<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('code');
            $table->integer('parent_id')->nullable(); 
            $table->timestamps();
        });

        Schema::create('productos', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('sku');
            $table->float('price',10,2);
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('productos_fotos', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('src');
            $table->integer('producto_id'); 
            $table->timestamps();
        });

        Schema::create('productos_categorias', function (Blueprint $table) {
            $table->id(); 
            $table->integer('categoria_id'); 
            $table->integer('producto_id'); 
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
        Schema::dropIfExists(['categorias','productos','productos_fotos','productos_categorias']);
    }
}
