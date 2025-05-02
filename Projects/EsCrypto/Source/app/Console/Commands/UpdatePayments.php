<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Payment;

class UpdatePayments extends Command
{
    protected $signature = 'update:payments';
    protected $description = 'Update Payment table';

    public function handle()
    {
        $payments = Payment::all();

        if ($payments->count() > 100) {
            // Sort payments by created_at in descending order
            $sortedPayments = $payments->sortByDesc('created_at');

            // Slice the collection to get the latest 5 payments
            $latestPayments = $sortedPayments->take(100);

            // IDs of the payments to be kept
            $paymentIdsToKeep = $latestPayments->pluck('id')->all();

            // Delete payments that are not in the latest 5
            Payment::whereNotIn('id', $paymentIdsToKeep)->delete();
        }

        $this->info('Payments table updated successfully.');
    }
}
