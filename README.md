<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project ini Sudah di Deploy ke Heroku
http://team-assignment-1.herokuapp.com/

## Yang digunakan Pada Project ini
- Laravel 8
- Composer
- NodeJS
- NPM
- InertiaJS
- VueJS
- vue-sweetalert2
- PostgreSQL (Heroku)
- Apache (Heroku)
## Panduan Installasi (Local) non Heroku
1. Clone Project ini `git clone https://github.com/oktavianto/team-assignment-1.git`
2. Copy `.env.example`menjadi `.env`
3. Jalankan perintah `composer install`
4. Jalankan perintah `npm install` & jalankan `npm run dev` untuk development atau `npm run prod` untuk production.
5. Ketik `php artisan key:generate`
6. Setting pada bagian database di `.env`
7. Karena Project ini di Deploy di Heroku jadi ada perubahan pada file `database.php`
Hapus bagian berikut:
```php
$url = parse_url(getenv("DATABASE_URL"));
if (!$url['path']) {
    $url = parse_url("#");
}
$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);
```
Lalu Replace Bagian pgsql dibawah ini
```php
'pgsql' => [
            'driver' => 'pgsql',
            'host' => $host,
            'database' => $database,
            'username' => $username,
            'password' => $password,
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
],
```
Menajadi seperti dibawah ini:
```php
'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
],
```
8. Setelah itu ketik `php artisan migrate`
9. `php artisan serve` untuk menjalankan.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
