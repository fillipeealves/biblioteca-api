<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Services\BookService;

class BookController extends Controller {
    protected $service;
    public function __construct(BookService $service) {
        $this->middleware('auth:api')->except(['index','show']);
        $this->service = $service;
    }

    public function index() { return BookResource::collection($this->service->list()); }
    public function store(StoreBookRequest $req) { return new BookResource($this->service->store($req->validated())); }
    public function show($id) { return new BookResource($this->service->show($id)); }
    public function update(UpdateBookRequest $req,$id) { return new BookResource($this->service->update($id,$req->validated())); }
    public function destroy($id) { $this->service->destroy($id); return response()->json(null,204); }
}
