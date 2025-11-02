<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource {
    public function toArray($request) {
        return [
            'id' => $this->id,
            'user' => [ 'id' => $this->user->id, 'name' => $this->user->name, 'email' => $this->user->email ],
            'book' => new BookResource($this->whenLoaded('book')),
            'loaned_at' => $this->loaned_at,
            'due_at' => $this->due_at,
            'returned_at' => $this->returned_at,
            'status' => $this->status,
        ];
    }
}
