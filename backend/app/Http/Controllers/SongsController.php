<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSongsRequest;
use App\Models\Songs;
use App\Repositories\SongsRepository;
use Illuminate\Http\Request;

class SongsController extends Controller
{
	protected $songsRepository;

	public function __construct(SongsRepository $songsRepository)
	{
		$this->songsRepository = $songsRepository;
	}

	public function index()
	{
		$songs = $this->songsRepository->all();

		return $this->sendSuccess($songs);
	}

	public function show(int $id)
	{
		$songs = $this->songsRepository->find($id);

		return $this->sendSuccess($songs);
	}

	public function create(CreateSongsRequest $request)
	{
		$songs = $this->songsRepository->store($request->all());

		return $this->sendSuccess($songs, 201);
	}

	public function update(int $id, CreateSongsRequest $request)
	{
		$songs = $this->songsRepository->update($id, $request->all());

		return $this->sendSuccess($songs);
	}

	public function destroy(int $id)
	{
		$songs = $this->songsRepository->delete($id);

		return $this->sendSuccess($songs, 204);
	}
}
