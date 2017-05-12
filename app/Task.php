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

    /**
     * User relationship
     * @return [type] [description]
     */
    public function user()
    {
    	//recordar que hay que retornar el objeto
    	return $this->belongsTo(User::class);
    }


}
