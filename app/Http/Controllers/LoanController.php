<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Resources\LoanResource;
use App\Services\LoanService;
use Illuminate\Http\Request;

class LoanController extends Controller {
    protected $service;
    public function __construct(LoanService $service) {
        $this->middleware('auth:api');
        $this->service = $service;
    }

    public function index() { return LoanResource::collection($this->service->list()); }

    public function store(StoreLoanRequest $req) {
        $loan = $this->service->store($req->validated(), auth('api')->id());
        return new LoanResource($loan);
    }

    public function show($id) { return new LoanResource($this->service->show($id)); }

    public function update(Request $req, $id) {
        if ($req->has('returned') && (bool)$req->input('returned')) {
            $loan = $this->service->markReturned($id);
            return new LoanResource($loan);
        }
        return response()->json(['message'=>'Nada a atualizar'],400);
    }

    public function destroy($id) { $this->service->destroy($id); return response()->json(null,204); }
}
