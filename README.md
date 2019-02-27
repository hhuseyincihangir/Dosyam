# Dosyam

Basit, çok kullanıcılı dosya barındırma sistemi.

# Temel Özellikler

* Çoklu sürükle bırak.
* Çoklu dosya yükleme.
* İlkel kullanıcı erişim izinleri.

# Gereksinimler

+ PHP 7
+ Mysql

# Kurulum

### 1. Dosyaların Kopyalanması
Kaynak kodunu indirdikten sonra apache serverınızın **www/** veya **htdocs/** isimli klasörünün içine kopyalayınız.

### 2. Veritabanın İçeri Aktarılması
Mysql veritabanı yönetim sisteminiz (phpmyadmin, HeidiSQL, MySQL Workbench, vb.) ile **dosyam_db** ismiyle yeni bir veritabanı oluşturmalısınız (Veritabanı ismini değiştirmek istiyorsanız **application/config/database.php** dosyasındaki **$db['default']** değişkeninin **"database"** indisinin değerini de değiştirmeniz gerekli).

### 3. Veritabanı Ayarları
Veritabanı ayarları için **application/config/** klasörü içindeki **database.php** dosyasından, kendi veritabanı bilgilerinize göre aşağıdaki gibi doldurmalısınız.

```php
----------------------------------------------------------
'hostname' => 'localhost', // Veritabanı sunucusu adresi
'username' => 'root', // Veritabanı kullanıcı adı
'password' => 'rootroot', // Veritabanı kullanıcı şifresi
'database' => 'dosyam_db', // Veritabanı ismi
----------------------------------------------------------
```
### 4. URL ayarları
**Dosyam**'ın çalışması için **application/config/config.php** dosyasından,

```php
$config['base_url'] = 'https://localhost/Dosyam/';
```
değişkeninin metin değerini, proje dizinin yüklediğiniz **"host"** üzerindeki tam adresi ile değiştirmelisiniz.

### 5. Giriş ve Mutlu Son :smile:
Son olarak giriş ekranında,

- **Kullanıcı Adı** : hashusci
- **Şifre** : admin_hashusci

değerlerini girebilirsiniz.

# Kullanılan Teknolojiler

## Back-End
+ PHP
+ Codeigniter 3.1.9
+ Mysql
## Front-End
+ HTML
+ JavaScript
+ Jquery 1.10.2
+ CSS
+ Bootstrap 3.3.7
+ DropzoneJS
+ Font Awesome 4.7.0
# Ekran Görüntüleri

  ## Giriş
  
  ![dosyam_giris](https://user-images.githubusercontent.com/15706050/52592936-be868f00-2e58-11e9-99e6-5c6e451f4fec.PNG)
  
  ## Dosya Yönetimi
  
  ![dosyam_yonetim](https://user-images.githubusercontent.com/15706050/52593037-04435780-2e59-11e9-88e2-62bb0da45def.PNG)


# LİSANS HAKKINDA

Copyright (C) 2018 Hasan Hüseyin CİHANGİR

Bu program özgür yazılımdır: 
Özgür Yazılım Vakfı tarafından yayımlanan GNU Genel Kamu Lisansı’nın sürüm 3 ya da (isteğinize bağlı olarak)
daha sonraki sürümlerinin hükümleri altında yeniden dağıtabilir ve/veya değiştirebilirsiniz.

Bu program, yararlı olması umuduyla dağıtılmış olup, programın BİR TEMİNATI YOKTUR; TİCARETİNİN YAPILABİLİRLİĞİNE
VE ÖZEL BİR AMAÇ İÇİN UYGUNLUĞUNA dair bir teminat da vermez.

Ayrıntılar için GNU Genel Kamu Lisansı’na göz atınız.
http://www.gnu.org/licenses/gpl-3.0.html

Bu programla birlikte GNU Genel Kamu Lisansı’nın bir kopyasını elde etmiş olmanız gerekir. 
Eğer elinize ulaşmadıysa <http://www.gnu.org/licenses/> adresine bakınız.
