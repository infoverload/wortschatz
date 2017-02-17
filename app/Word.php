<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{

	protected $fillable = ["gender", "body", "translation", "note"];

    public function category() 
    {
    	return $this->belongsTo("App\Category");
    }

    public function user()
	{
		return $this->belongsTo("App\User");
	}

}
