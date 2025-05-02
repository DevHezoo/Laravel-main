<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Shortlink;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

class UpdateLinks extends Command
{
    protected $signature = 'update:links';
    protected $description = 'Update shortlinks table';

    public function handle()
    {

        
        // // Retrieve all users
        // $users = User::all();
        $tasks = DB::table('shortlink_tasks')->get();

        foreach ($users as $user) {
            // $links = $user->links;

            // Check if '(' is not present and the date is not today
            // if (strpos($links, '(') === false || !Str::contains($links, '[' . now()->format('Y-m-d'))) {
                $shortlinks = DB::table('shortlinks')->get();
                $newLinks = [];

                foreach ($shortlinks as $shortlink) {
                    $unit = $shortlink->unit;

                    // Get a random link with the corresponding unit
                    $randomLink = DB::table('links')
                        ->where('link', 'LIKE', "%$unit%")
                        ->inRandomOrder()
                        ->first();

                    if ($randomLink) {
                        // Update the shortlink with the new link and hasher
                        $newLinks[] = $randomLink->id;
                    }
                }

                // Update the user's links with the new links and the current date
                $user->update([
                    'links' => '(' . implode(',', $newLinks) . ') [' . now()->format('Y-m-d H:i:s') . ']',
                ]);
                // $this->info('Links updated successfully.');
            // } else {
            //     // $this->info('No update needed. Links already contain \'(\'.');
            // }
        }

        //////// Delete All "FALSE"

        foreach ($tasks as $task) 
        {
            if ($task->status === 'FALSE') {
                DB::table('shortlink_tasks')->where('id', $task->id)->delete();
            }
        }


        DB::table('seos')
            ->where('id', 1)
            ->update([
                'updated' => Carbon::now(),
            ]);


        $logFilePath = storage_path('logs/laravel.log');
        File::put($logFilePath, '');
    }
}
