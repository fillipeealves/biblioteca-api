<?php
namespace App\Repositories;

use App\Models\Loan;

class LoanRepository {
    public function all($perPage=15) { return Loan::with(['user','book'])->paginate($perPage); }
    public function find($id) { return Loan::with(['user','book'])->findOrFail($id); }
    public function create(array $data) { return Loan::create($data); }
    public function update($id, array $data) { $model = Loan::findOrFail($id); $model->update($data); return $model; }
    public function delete($id) { return Loan::findOrFail($id)->delete(); }
}
