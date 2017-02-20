# Senior/Regular PHP Developer Test

#### Tools & Technologies
* Laravel PHP Framework 5.4
* PHP 5.6
* MariaDB 10.1
* [Postman API Documentation App](https://www.getpostman.com/)
* Composer

#### Instructions to test

* `git clone https://github.com/dumindu/apitestsrc.git`
* `cd apitestsrc && composer install`
* `cp .env.example .env && php artisan key:generate`
* Create a new database and a new user
* Update DB configurations in .env
```
DB_DATABASE=lzdapitest
DB_USERNAME=lzdapitest_user
DB_PASSWORD=lzdapitest_pass
```
* Update Mail configurations in .env
```
MAIL_HOST=smtp.mailtrap.io
MAIL_USERNAME=3cebf8774d22ac
MAIL_PASSWORD=ed2e85c41e2785
```
* `php artisan migrate:refresh --seed`
* `php artisan serve`
* Open [Postman App](https://www.getpostman.com/) and Import postman_collection.json in the project root

#### Testable URLs
![Testable_urls](http://i.imgur.com/IWIwMLy.png)

#### Points to Highlight

* I tried to use [Vagrant and Ansible provisionings](https://github.com/dumindu/apitest) at the beginning of the project but currently my OS is bit unstable after I tried to use Docker on Windows 10 few weeks ago. However I used the [same project](https://github.com/dumindu/Vagrant-Ansible-LEMP-Skeleton) about a month ago and it worked at that time.
* mailtrap.io login details [dumindumr`at`gmail.com and Public12]
