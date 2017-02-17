<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = ["title", "colour"];

	public function user()
	{
		return $this->belongsTo("App\User");
	}

	public function words()
	{
		return $this->hasMany("App\Word");
	}

	public function addWord(Word $word) 
	{
		return $this->words()->save($word);
	} 
	  
}
