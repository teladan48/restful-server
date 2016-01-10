## Requirement

1. PHP v5.6
2. MySQL > v5.5
3. Composer https://getcomposer.org/

## Clone, Install, Config

1. Jalankan `git clone`.
2. Buat MySQL database.
3. Buat file `.env` dengan meng-copy isi file `.env.example`.
4. Sesuaikan konfigurasi yang belum terisi di file `.env`.
5. Isikan `APP_KEY` dengan 32 karakter random.
6. Jalankan `composer install`
7. Jalankan `php artisan migrate`.
8. Jalankan `php artisan db:seed`.
9. Jalankan `php -S 0.0.0.0:8000 -t public`
10. Seharusnya sudah bisa akses `http://localhost:8000`

## Development
1. Pelajari dokumentasi framework Lumen https://lumen.laravel.com/docs/ dan Laravel https://laravel.com/docs/5.2/