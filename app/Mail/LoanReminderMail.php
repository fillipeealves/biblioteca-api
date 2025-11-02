<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Loan;

class LoanReminderMail extends Mailable {
    use Queueable, SerializesModels;
    public $loan;
    public function __construct(Loan $loan) { $this->loan = $loan; }

    public function build() {
        return $this->subject('Lembrete de devolução - Biblioteca')
                    ->view('emails.loan_reminder')
                    ->with(['loan' => $this->loan]);
    }
}
