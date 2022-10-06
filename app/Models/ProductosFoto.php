<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosFoto
 * 
 * @property int $id
 * @property string $name
 * @property string $src
 * @property int $producto_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class ProductosFoto extends Model
{
	protected $table = 'productos_fotos';

	protected $casts = [
		'producto_id' => 'int'
	];

	protected $fillable = [
		'name',
		'src',
		'producto_id'
	];
}
