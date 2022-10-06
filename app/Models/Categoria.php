<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $parent_id
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';

	protected $casts = [
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'code',
		'parent_id',
		'type'
	];
}
