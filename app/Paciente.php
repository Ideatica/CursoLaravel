<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';

	protected $fillable = [
        'rut',
        'primer_nombre',
        'segundo_nombre',
        'apellido_paterno',
        'apellido_materno'
    ];

	public function scopeSearch($query, $value)
    {
        return $query->where('primer_nombre', 'LIKE', "%$value%");
    }
}