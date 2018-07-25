<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{	
	protected $table = 'roles';

	protected $fillable = [
        'name', 
        'display_name', 
        'description',
        'color'
    ];
    
    public function scopeSearch($query, $value)
    {
        return $query->where('name', 'LIKE', "%$value%")
            ->OrWhere('display_name', 'LIKE', "%$value%");
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

}