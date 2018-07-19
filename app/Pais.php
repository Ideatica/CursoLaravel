<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

	protected $table = 'paises';
	protected $fillable = [
	];

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'LIKE', "%$value%");
    }
}