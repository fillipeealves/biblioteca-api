<?php
namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService {
    protected $repo;
    public function __construct(CategoryRepository $repo) { $this->repo = $repo; }
    public function list($perPage=15) { return $this->repo->all($perPage); }
    public function show($id) { return $this->repo->find($id); }
    public function store(array $data) { return $this->repo->create($data); }
    public function update($id,array $data) { return $this->repo->update($id,$data); }
    public function destroy($id) { return $this->repo->delete($id); }
}
