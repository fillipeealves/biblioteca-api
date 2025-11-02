<?php
namespace App\Services;

use App\Repositories\LoanRepository;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class LoanService {
    protected $repo;
    public function __construct(LoanRepository $repo) { $this->repo = $repo; }

    public function list($perPage=15) { return $this->repo->all($perPage); }
    public function show($id) { return $this->repo->find($id); }

    public function store(array $data, $userId) {
        return DB::transaction(function() use ($data,$userId) {
            $book = Book::lockForUpdate()->findOrFail($data['book_id']);

            $activeLoans = $book->loans()->where('status','!=','returned')->count();
            if ((int)$book->copies <= $activeLoans) {
                throw new \Exception('Não há exemplares disponíveis');
            }

            $loanData = [
                'user_id' => $userId,
                'book_id' => $data['book_id'],
                'loaned_at' => now()->toDateString(),
                'due_at' => $data['due_at'],
                'status' => 'borrowed'
            ];

            return $this->repo->create($loanData);
        });
    }

    public function markReturned($id) {
        return DB::transaction(function() use ($id) {
            $loan = $this->repo->find($id);
            if ($loan->status === 'returned') return $loan;
            $loan->returned_at = now()->toDateString();
            $loan->status = 'returned';
            $loan->save();
            return $loan;
        });
    }

    public function destroy($id) { return $this->repo->delete($id); }
}
