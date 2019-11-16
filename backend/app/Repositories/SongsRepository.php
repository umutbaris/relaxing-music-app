<?php

namespace App\Repositories;

use App\Models\Songs;
use App\Quote;
use Auth;

class songsRepository extends BaseRepository
{
	protected $modelName = Songs::class;
}
