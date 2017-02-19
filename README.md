# FlockOS PHP SDK
PHP SDK for flockOS. This Library is in development stage.

### Installation
To resolve those dependencies you can do it in two ways.
1. Register your Flock Facade by adding in config `app.php` file

```php
'Flock' => Qafeen\Flock\Flock::class,
```

If you are on laravel 5.4 then you can do it easily by using and laravel will take care to resolve.

```php
use Facades\Qafeen\Flock\Flock
```


### Few are the APIs available for now
1. To decrept jwt token you can do it easily by

```php
$response = Flock::decodePayload();
```

2. To Log an event in database 

```php
Flock::logEvent();
```

And few more API is comming soon...
