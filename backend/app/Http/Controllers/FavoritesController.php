<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateFavoritesRequest;
use App\Models\Favorites;
use App\Repositories\FavoritesRepository;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
	protected $favoritesRepository;
	
	public function __construct(FavoritesRepository $favoritesRepository)
	{
		$this->favoritesRepository = $favoritesRepository;
	}

	public function index()
	{
		$favorites = $this->favoritesRepository->all();

		return $this->sendSuccess($favorites);
	}

	public function show(int $id)
	{
		$favorites = $this->favoritesRepository->find($id);

		return $this->sendSuccess($favorites);
	}

	public function create(CreateFavoritesRequest $request)
	{
		$favorites = $this->favoritesRepository->store($request->all());

		return $this->sendSuccess($favorites, 201);
	}

	public function update(int $id, CreateFavoritesRequest $request)
	{
		$favorites = $this->favoritesRepository->update($id, $request->all());

		return $this->sendSuccess($favorites);
	}

	public function destroy(int $id)
	{
		$favorites = $this->favoritesRepository->delete($id);

		return $this->sendSuccess($favorites, 204);
	}
}
