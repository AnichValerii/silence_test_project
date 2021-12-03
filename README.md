<p align="center">
    <h1 align="center">Silence</h1>
    <br>
</p>

Console application for converting Silence intervals from xml file to book chapters
-------------------

Required
```
PHP version 7.3 or higher
Composer
```

After cloning project, install required components via composer and generate laravel keys
```
composer install
cp .env.example .env
php artisan key:generate
```

Console command for converting
```
artisan conver:xml param1 param2 param3 param4
```

Where
```
param1 - Path to xml file with silence intervals
param2 - Duration in seconds for indicating a chapter transition
param3 - Maximum duration in seconds of chapter segment
param4 - A silence duration which can be used to split a long chapter

#for example
php artisan conver:xml ../testXml/silence1.xml 4 300 3
```

Output example
```
http://joxi.ru/DrlXWOocKRKDXr
```
