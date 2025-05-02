<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\News;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class UpdateNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update daily news';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lastNews = News::orderBy('created_at', 'desc')->first();

        // Retrieve users ordered by descending
        $users = User::orderBy('email', 'desc')->get();

        if ($lastNews) {
            foreach ($users as $user) {
                // Adjust this condition based on your actual User model structure
                if ($user->notification < $lastNews->id) {
                    // Send email
                    Mail::raw($lastNews->message . "\n\nDate:\n" . Carbon::now()->format('Y-m-d'), function ($message) use ($user) {
                        $message->to($user->email)
                            ->subject('News Msg');
                    });
                }
            }

            // Update user's notification after finishing the loop
            foreach ($users as $user) {
                $user->notification = $lastNews->id;
                $user->save();
            }
        }
    }
}
