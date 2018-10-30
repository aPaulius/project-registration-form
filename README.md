Project registration form
=========================
![Alt text](assets/img/project_registration_form.png)

## Setup
```
[Install wkhtmltopdf link](https://wkhtmltopdf.org/downloads.html)
[Enable imagick extension](http://php.net/manual/en/book.imagick.php)
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
yarn install
yarn encore production
```
