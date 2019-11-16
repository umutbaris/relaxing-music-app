<?php

namespace App\Repositories;

use App\Models\Categories;
use App\Quote;
use Auth;

class CategoryRepository extends BaseRepository
{
	protected $modelName = Categories::class;
}
