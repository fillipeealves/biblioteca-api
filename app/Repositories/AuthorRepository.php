<?php
namespace App\Repositories;

use App\Models\Author;

class AuthorRepository {
    public function all($perPage=15) { return Author::paginate($perPage); }
    public function find($id) { return Author::findOrFail($id); }
    public function create(array $data) { return Author::create($data); }
    public function update($id, array $data) { $model = Author::findOrFail($id); $model->update($data); return $model; }
    public function delete($id) { return Author::findOrFail($id)->delete(); }
}
