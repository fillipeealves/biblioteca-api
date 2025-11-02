<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Loan;
use App\Mail\LoanReminderMail;

class SendLoanReminder implements ShouldQueue {
    use InteractsWithQueue, Queueable, SerializesModels;

    public function handle() {
        $targetDate = now()->addDays(2)->toDateString();
        $loans = Loan::with('user','book')
                     ->where('due_at', $targetDate)
                     ->where('status','!=','returned')
                     ->get();

        foreach($loans as $loan) {
            Mail::to($loan->user->email)->send(new LoanReminderMail($loan));
        }
    }
}
