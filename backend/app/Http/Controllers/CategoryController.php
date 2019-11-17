<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Categories;
use App\Repositories\CategoryRepository;


class CategoryController extends Controller
{
	protected $categoryRepository;
	
	public function __construct(CategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}

	public function index()
	{
		$category = $this->categoryRepository->all('songs');

		return $this->sendSuccess($category);
	}

	public function show(int $id)
	{
		$category = $this->categoryRepository->find($id, 'songs');

		return $this->sendSuccess($category);
	}

	public function create(CreatecategoryRequest $request)
	{
		$category = $this->categoryRepository->store($request->all());

		return $this->sendSuccess($category, 201);
	}

	public function update(int $id, CreatecategoryRequest $request)
	{
		$category = $this->categoryRepository->update($id, $request->all());

		return $this->sendSuccess($category);
	}

	public function destroy(int $id)
	{
		$category = $this->categoryRepository->delete($id);

		return $this->sendSuccess($category, 204);
	}
}
