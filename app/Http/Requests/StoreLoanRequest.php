<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return [
            'book_id' => 'required|exists:books,id',
            'due_at' => 'required|date|after:today'
        ];
    }
}
