# EncryptionCompat

Encryption compatibility for Laravel < 5.1 on PHP 7.1

### Install

- `composer require "sevenshores/encryption-compat:~4.1"`
- remove `'Illuminate\Encryption\EncryptionServiceProvider'` from `app/config/app.php`
- add `'SevenShores\EncryptionCompat\EncryptionServiceProvider'` to `app/config/app.php`
- add `cipher => 'AES-128-CBC',` to `app/config/app.php`
- run `php artisan key:generate`

#### Notes

Use at your own risk.

#### License

MIT

#### Thanks

- [@sisve](https://github.com/sisve) for the idea
- [Laravel](https://github.com/laravel/laravel) for the code. I mostly sliced up existing code.
