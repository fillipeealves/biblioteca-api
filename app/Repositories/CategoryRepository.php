<?php
namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    public function all($perPage=15) { return Category::paginate($perPage); }
    public function find($id) { return Category::findOrFail($id); }
    public function create(array $data) { return Category::create($data); }
    public function update($id, array $data) { $model = Category::findOrFail($id); $model->update($data); return $model; }
    public function delete($id) { return Category::findOrFail($id)->delete(); }
}
