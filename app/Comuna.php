<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{

	protected $table = 'comunas';
	protected $fillable = [
	];

    public function scopeSearch($query, $value)
    {
        return $query->where('nombre', 'LIKE', "%$value%");
    }

    public function region()
    {
        return $this->belongsTo('App\Region', 'parent_id');
    }
}