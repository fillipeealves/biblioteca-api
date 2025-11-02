<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Services\AuthorService;

class AuthorController extends Controller {
    protected $service;
    public function __construct(AuthorService $service) { $this->service = $service; }

    public function index() { return AuthorResource::collection($this->service->list()); }
    public function store(StoreAuthorRequest $req) { return new AuthorResource($this->service->store($req->validated())); }
    public function show($id) { return new AuthorResource($this->service->show($id)); }
    public function update(UpdateAuthorRequest $req,$id) { return new AuthorResource($this->service->update($id,$req->validated())); }
    public function destroy($id) { $this->service->destroy($id); return response()->json(null,204); }
}
