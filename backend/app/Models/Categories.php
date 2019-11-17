<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	protected $guarded = [];
	
	public function songs()
	{
		return $this->hasMany('App\Models\Songs');
	}
}
