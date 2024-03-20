# Proje Adı

Bu proje [Laravel](https://laravel.com/) kullanılarak geliştirilmiştir. Proje de öğrencilerin bilgileri kaydediliyor, Öğrencinin Girdikleri sınavlardan almış oldukları not kaydediliyor ve Genel Ağırlıklı Not Ortlaamsı Hesaplanıyor.Öğrenci bu bilgilerini görmek için Okul Numarası ile arama yapması gerekiyor
## Gereksinimler

- [PHP](https://www.php.net/) (versiyon 8.1.0)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) ve [npm](https://www.npmjs.com/)
- [MySQL](https://www.mysql.com/) (opsiyonel olarak başka bir veritabanı)

## Kurulum

1. Bu depoyu klonlayın: `git clone https://github.com/kullanici/ad.git`
2. Proje dizinine gidin: `cd proje-adı`
3. Bağımlılıkları yüklemek için Composer'ı kullanın: `composer install`
4. Gerekli npm paketlerini yüklemek için: `npm install`
5. `.env.example` dosyasını kopyalayıp `.env` adıyla oluşturun ve veritabanı ayarlarınızı yapın: `cp .env.example .env`
6. Veritabanını oluşturmak için: `php artisan migrate`
7. Laravel uygulamasının anahtarını oluşturmak için: `php artisan key:generate`
8. Uygulamayı çalıştırmak için: `php artisan serve`

## Kullanım

Proje çalıştırıldıktan sonra, tarayıcınızda `http://localhost:8000` adresini ziyaret ederek uygulamaya erişebilirsiniz.

## Katkıda Bulunma

1. Bu depoyu fork edin.
2. Yeni bir özellik veya düzeltme için bir dal oluşturun: `git checkout -b yeni-özellik`
3. Değişikliklerinizi yapın ve bunları işlemek için bir taahhüt yapın: `git commit -am 'Yeni özellik ekle'`
4. Dalınızı ana depoya push edin: `git push origin yeni-özellik`
5. Bir birleştirme isteği oluşturun.
