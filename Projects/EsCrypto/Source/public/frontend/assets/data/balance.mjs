    const cryptoSymbols = [
      'BTC', 'LTC', 'DOGE', 'TRX',
      'BNB', 'BCH', 'DASH', 'DGB',
      'ETH', 'FEY', 'SOL', 'ZEC', 'USDT'
    ];

    // Fetch prices from the API
    async function fetchPrices() {
      const prices = {};

      for (const symbol of cryptoSymbols) {
        let cryptoSymbol = null;

        switch (symbol) {
  case 'BTC':
    cryptoSymbol = 'BTCUSDT';
    break;
  case 'LTC':
    cryptoSymbol = 'LTCUSDT';
    break;
  case 'DOGE':
    cryptoSymbol = 'DOGEUSDT';
    break;
  case 'TRX':
    cryptoSymbol = 'TRXUSDT';
    break;
  case 'BNB':
    cryptoSymbol = 'BNBUSDT';
    break;
  case 'BCH':
    cryptoSymbol = 'BCHUSDT';
    break;
  case 'DASH':
    cryptoSymbol = 'DASHUSDT';
    break;
  case 'DGB':
    cryptoSymbol = 'DGBUSDT';
    break;
  case 'ETH':
    cryptoSymbol = 'ETHUSDT';
    break;
  case 'SOL':
    cryptoSymbol = 'SOLUSDT';
    break;
  case 'ZEC':
    cryptoSymbol = 'ZECUSDT';
    break;
  case 'FEY':
    cryptoSymbol = 'feyorra';
    break;
          case 'USDT':
            prices['USDT'] = "1";
            break;

          default:
            break;
        }

        if (cryptoSymbol) {
          if (cryptoSymbol === 'feyorra') {
            const coingeckoApiEndpoint = `https://api.coingecko.com/api/v3/simple/price?ids=${cryptoSymbol}&vs_currencies=usd`;

            try {
              const coingeckoResponse = await fetch(coingeckoApiEndpoint);
              const coingeckoData = await coingeckoResponse.json();
              prices[symbol] = coingeckoData[cryptoSymbol]['usd'];
            } catch (error) {
              console.error(`Failed to fetch price for ${symbol} from Coingecko:`, error.message);
            }
          } else {
            const binanceApiUrl = `https://api.binance.com/api/v3/ticker/price?symbol=${cryptoSymbol}`;

            try {
              const binanceResponse = await fetch(binanceApiUrl);
              const binanceData = await binanceResponse.json();

              if (binanceData.hasOwnProperty('price')) {
                prices[symbol] = binanceData.price;
              }
            } catch (error) {
              console.error(`Failed to fetch price for ${symbol} from Binance:`, error.message);
            }
          }
        }
      }

      // Log or process prices here
      console.log(JSON.stringify(prices));

      // Store prices in localStorage
      //localStorage.setItem('prices', JSON.stringify(prices));
    }

    // Run the script
    fetchPrices();