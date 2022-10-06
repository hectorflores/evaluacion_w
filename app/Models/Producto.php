<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property string $name
 * @property string $sku
 * @property float $price
 * @property string $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'name',
		'sku',
		'price',
		'description'
	];

	public function productoCategorias()
    {
        return $this->hasMany(ProductosCategoria::class, 'producto_id');
    }
}
