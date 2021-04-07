<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MOffice
 * 
 * @property int $id
 * @package App\Models
 */
class MOffice extends Model
{
	protected $table = 'm_office';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name',
		'price',
		'offices',
		'tables',
		'sqm',
	];
}