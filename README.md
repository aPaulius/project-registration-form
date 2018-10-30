Project registration form
=========================
![Alt text](assets/img/project_registration_form.png)

## Setup
[Install wkhtmltopdf](https://wkhtmltopdf.org)

[Enable imagick extension](http://php.net/manual/en/book.imagick.php)
```
composer install
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
yarn install
yarn encore production
```
