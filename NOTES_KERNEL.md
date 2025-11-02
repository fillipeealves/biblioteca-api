Adicione no app/Console/Kernel.php dentro do método schedule:
use Illuminate\Console\Scheduling\Schedule;

protected function schedule(Schedule $schedule) {
    $schedule->job(new \App\Jobs\SendLoanReminder)->dailyAt('08:00');
}
