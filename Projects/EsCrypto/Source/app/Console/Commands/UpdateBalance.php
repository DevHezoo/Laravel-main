<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Mahtab2003\FaucetPay\Api;
class UpdateBalance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch balance';
    /**
     * Execute the console command.
     */
    public function handle()
    {
    $cryptoSymbols = [
        'BTC', 'LTC', 'DOGE', 'TRX',
        'BNB', 'BCH', 'DASH', 'DGB',
        'ETH', 'FEY', 'SOL', 'ZEC', 'USDT'
    ];

    $available = [];
    $apiKey = Config::get('api.faucetpay');
    foreach ($cryptoSymbols as $symbol) {
        $api = new Api($apiKey, $symbol);
        $response = $api->getBalance();
            if ($response->isSuccessful()) {
                    $data = $response->getData();
                    $available[$symbol] = number_format($data['balance'] / 100000000, 8);
            }
    }
    
    $jsonPrices = json_encode($available, JSON_PRETTY_PRINT);
    $resultPath = public_path('frontend/assets/data/result/balance.txt');
    // Save the JSON string to the result file
    file_put_contents($resultPath, $jsonPrices);
    }
}