<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

	protected $table = 'regiones';
	protected $fillable = [
	];

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'LIKE', "%$value%");
    }
}