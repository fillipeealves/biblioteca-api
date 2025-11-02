<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Loan;

class DatabaseSeeder extends Seeder {
    public function run() {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@biblioteca.test',
            'password' => bcrypt('senha123')
        ]);

        Author::factory(10)->create();
        Category::factory(8)->create();
        Book::factory(30)->create();
        Loan::factory(5)->create();
    }
}
