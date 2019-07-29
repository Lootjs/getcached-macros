# Laravel macros "getCached"
## For Laravel 5
### Информация
Макрос, обертка на `Illuminate\Database\Eloquent\Builder::get()`, для кеширования запросов
### Пример использования
Вместо get() используя getCached(), вы получите скешированные данные, вместо очередного запроса в базу.
#### Без макроса:
```php
Book::query()
->whereIn('id', [1,2,3])
->get();
```
#### С макросом:
```php
Book::query()
->whereIn('id', [1,2,3])
->getCached();
```
### Установка
Скопировать макрос из файла `AppServiceProvider.php`  (линии: 15-26) в свой сервис-провайдер
