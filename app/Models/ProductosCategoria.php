<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosCategoria
 * 
 * @property int $id
 * @property int $categoria_id
 * @property int $producto_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProductosCategoria extends Model
{
	protected $table = 'productos_categorias';

	protected $casts = [
		'categoria_id' => 'int',
		'producto_id' => 'int'
	];

	protected $fillable = [
		'categoria_id',
		'producto_id'
	];

	public function categorias()
    {
        return $this->hasMany(Categoria::class, 'id','categoria_id');
    }
}
