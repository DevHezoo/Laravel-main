<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
class UpdateDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update daily task';
    /**
     * Execute the console command.
     */
    public function handle()
    {

    // Retrieve users' email addresses ordered by descending
    $users = User::orderBy('email', 'desc')->pluck('email');

    // Iterate through each user and send a daily message
    foreach ($users as $email) {
        Mail::raw('Tasks Updated Successfully: ' . Carbon::now()->format('Y-m-d'), function ($message) use ($email) {
            $message->to($email)
                ->subject('Daily Msg');
        });
    }

    }
}