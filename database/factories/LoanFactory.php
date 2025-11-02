<?php
namespace Database\Factories;

use App\Models\Loan;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory {
    protected $model = Loan::class;
    public function definition() {
        $loaned = $this->faker->dateTimeBetween('-10 days','now');
        $due = (clone $loaned);
        $due->modify('+7 days');
        return [
            'user_id' => User::factory(),
            'book_id' => Book::factory(),
            'loaned_at' => $loaned->format('Y-m-d'),
            'due_at' => $due->format('Y-m-d'),
            'status' => 'borrowed',
        ];
    }
}
