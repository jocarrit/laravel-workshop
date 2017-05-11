<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model
{
    /**
     * atributos asignados de forma masiva
     * @var array
     */
    protected $fillable = ['name'];	

    public function user()
    {
    	return $this->belongsTo(User::class);
    }


}
