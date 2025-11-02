<?php
namespace App\Repositories;

use App\Models\Book;

class BookRepository {
    public function all($perPage=15) { return Book::with(['author','category'])->paginate($perPage); }
    public function find($id) { return Book::with(['author','category'])->findOrFail($id); }
    public function create(array $data) { return Book::create($data); }
    public function update($id, array $data) { $model = Book::findOrFail($id); $model->update($data); return $model; }
    public function delete($id) { return Book::findOrFail($id)->delete(); }
}
