<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Shortlink;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UpdateLink extends Command
{
    protected $signature = 'update:link {userId?}';
    protected $description = 'Update user table';

    public function handle()
    {

        // If a specific user ID is provided, retrieve that user
        $user = User::where('id', $this->argument('userId'))->first();

        if (!$user) {
            // $this->info('No user found.');
            return;
        }

        $links = $user->links;

        // Check if '(' is not present and the date is not today
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
    }
}
