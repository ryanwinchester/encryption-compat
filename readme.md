# EncryptionCompat

Encryption compatibility for Laravel < 5.1 on PHP 7.1

### Install

- `composer require "sevenshores/encryption-compat:~5.0"`
- remove `'Illuminate\Encryption\EncryptionServiceProvider'` from `config/app.php`
- add `'SevenShores\EncryptionCompat\EncryptionServiceProvider'` to `config/app.php`
- change `cipher` to `'AES-128-CBC'` in `config/app.php`
- run `php artisan key:generate`

#### Notes

Use at your own risk.

#### License

MIT

#### Thanks

- [@sisve](https://github.com/sisve) for the idea
- [Laravel](https://github.com/laravel/laravel) for the code. I mostly sliced up existing code.
