<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
class UpdatePrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch prices';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

$cryptoSymbols = [
    'BTC', 'LTC', 'DOGE', 'TRX',
    'BNB', 'BCH', 'DASH', 'DGB',
    'ETH', 'FEY', 'SOL', 'ZEC', 'USDT'
];

$prices = [];

foreach ($cryptoSymbols as $symbol) {
    $cryptoSymbol = null;

    switch ($symbol) {
        case 'BTC':
            $cryptoSymbol = 'BTCUSDT';
            break;
        case 'LTC':
            $cryptoSymbol = 'LTCUSDT';
            break;
        case 'DOGE':
            $cryptoSymbol = 'DOGEUSDT';
            break;
        case 'TRX':
            $cryptoSymbol = 'TRXUSDT';
            break;
        case 'BNB':
            $cryptoSymbol = 'BNBUSDT';
            break;
        case 'BCH':
            $cryptoSymbol = 'BCHUSDT';
            break;
        case 'DASH':
            $cryptoSymbol = 'DASHUSDT';
            break;
        case 'DGB':
            $cryptoSymbol = 'DGBUSDT';
            break;
        case 'ETH':
            $cryptoSymbol = 'ETHUSDT';
            break;
        case 'SOL':
            $cryptoSymbol = 'SOLUSDT';
            break;
        case 'ZEC':
            $cryptoSymbol = 'ZECUSDT';
            break;
        case 'FEY':
            $cryptoSymbol = 'feyorra';
            break;
        case 'USDT':
            $prices['USDT'] = "1";
            break;
        default:
            break;
    }

    if ($cryptoSymbol) {
        if ($cryptoSymbol === 'feyorra') {
            // $coingeckoApiEndpoint = "https://api.coingecko.com/api/v3/simple/price?ids={$cryptoSymbol}&vs_currencies=usd";
            $coingeckoApiEndpoint = config('api.coingeko_1') . $cryptoSymbol . config('api.coingeko_2');
            try {
                $client = new Client();
                $coingeckoResponse = $client->get($coingeckoApiEndpoint);
                $coingeckoData = json_decode($coingeckoResponse->getBody(), true);
                $prices[$symbol] = $coingeckoData[$cryptoSymbol]['usd'];
            } catch (Exception $e) {
                echo "Failed to fetch price for $symbol from Coingecko: " . $e->getMessage() . PHP_EOL;
            }
        } else {
            // $binanceApiUrl = "https://api.binance.com/api/v3/ticker/price?symbol={$cryptoSymbol}";
            $binanceApiUrl = config('api.binance') . $cryptoSymbol;
            try {
                $client = new Client();
                $binanceResponse = $client->get($binanceApiUrl);
                $binanceData = json_decode($binanceResponse->getBody(), true);

                if (isset($binanceData['price'])) {
                    $prices[$symbol] = $binanceData['price'];
                }
            } catch (Exception $e) {
                echo "Failed to fetch price for $symbol from Binance: " . $e->getMessage() . PHP_EOL;
            }
        }
    }
}

// Convert the array to a JSON-encoded string
$jsonPrices = json_encode($prices, JSON_PRETTY_PRINT);
$resultPath = public_path('frontend/assets/data/result/data.txt');
// Save the JSON string to the result file
file_put_contents($resultPath, $jsonPrices);

    }
}
