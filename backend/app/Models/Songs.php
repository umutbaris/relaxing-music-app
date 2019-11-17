<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
	protected $guarded = [];
	
	public function caregories()
	{
		return $this->hasMany('App\Models\Categories');
	}
}
