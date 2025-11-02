<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller {
    protected $service;
    public function __construct(CategoryService $service) { $this->service = $service; }

    public function index() { return CategoryResource::collection($this->service->list()); }
    public function store(StoreCategoryRequest $req) { return new CategoryResource($this->service->store($req->validated())); }
    public function show($id) { return new CategoryResource($this->service->show($id)); }
    public function update(UpdateCategoryRequest $req, $id) { return new CategoryResource($this->service->update($id, $req->validated())); }
    public function destroy($id) { $this->service->destroy($id); return response()->json(null,204); }
}
