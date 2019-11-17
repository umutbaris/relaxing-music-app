<?php

namespace App\Repositories;

use App\Models\Favorites;
use App\Quote;
use Auth;

class FavoritesRepository extends BaseRepository
{
	protected $modelName = Favorites::class;
}
