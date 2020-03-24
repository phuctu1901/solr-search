## Sử dụng solr để index và tìm kiếm dữ liệu lớn

### 1. Cài đặt
Hãy chắc chắn rằng bạn đã cài đặt và khởi chạy solr

Bạn đã cài đặt Laravel trên máy tính

```bash
git clone https://github.com/phuctu1901/solr-search
cd solr-search
composer install
php artisan key:generate
php artisan serve --host <your custom host> --p <your custom port>
```