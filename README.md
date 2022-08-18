## Executives Place

### Assumptions
1. scenario does not mention that you will need filter by past historic exchange rates 
2. step 3 is simply a conversion a to b along side user information
3. When i click onto ```https://exchangeratesapi.io/``` and try to get the free key it takes me ```https://apilayer.com/marketplace/exchangerates_data-api?preview=true#pricing``` which uses different domain so using api layer version.

### Setup

1. ```composer install ``` 
2. ```cp .env.example .env``` remember to fill out the api key also if you do set the ```CURRENCY_API_BASE_URL
SERVICE_CLASS_DRIVER=``` remember to fill it out or remove key itself also to flush the cache. 
3. ``` php artisan key:generate```
4.  i just used ```php artsian serve ``` for local host.
5. Fill out your db settings and run ``` php artisan migrate```
6. use ```php artisan migrate:fresh --seed``` which will reset tables and run seeder

### Test

All you need to do is run ```php artisan test``` just remember that when you run it, it will reseed the database and empty it  all out so if you want to use normal endpoint and website just run ```php artisan migrate:fresh --seed``` just to get everything back up and running.

### Issues or General questions or improvements
1. if leave the key in env file empty it will output as empty string and not use default from config so please make sure u fill it out since there isn't check on it atm.
2. For 3rd step wasn't too sure if i needed to update current user with new exchange salary since it wasn't really specified in question. its just within the json atm as ```convertedSalary```
3. One of the improvement would be including filtering of dates and cache the results.

