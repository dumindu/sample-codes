# Question
#### Fullstack test

**Scenario:**
* We have a hotel that has two room types:
  * Double room : This has an inventory of 5 rooms
  * Single room : This has an inventory of 5 rooms
* All rooms are available for booking on all days.
* Prices and inventory are independent of each other on a daily basis.

This data is presented in a calendar view, like below:

![sample calendar view](assets/images/sample_calendar_view.png)

**Task:**
* Create a working single page app that allows updates to the calendar, persisting to the database
* The changes to price or inventory should stay changed even if you refresh the page.
* The Bulk Operations form should allow to update multiple days at once depending on the selected criteria.
* UI should be polished. Similar to the above screenshot.

**Additional Points**
* You’re allowed to use an existing framework.
* We’re looking for a functional page but equally important is clean code.
* We prefer if you can host it somewhere for us to test. However, we’re perfectly fine with sending us a zip file or repo link.


# Solution

#### Tools & Technologies
* Laravel PHP Framework 5.3
* PHP 7.0.9 (>=5.6.4)
* MariaDB 10.1.16
* Bootstrap 4.0.0-alpha.5
* Node.js 6.2.2 & NPM 3.9.5
* Gulp & jQuery

#### Instructions to test

* Clone the repository
* Update DB configurations in .env 
* ```composer install```
* ```npm install```
* ```gulp --production```
* ```php artisan migrate:refresh --seed```
* ```php -S localhost:8000 -t public/```

Testable URL : /hotels/hilton-pattaya-1/issuance-calendar/2017-01

#### Points to Hi-light

* [DB Design](database/)
* [UI/UX](design)
* [To-do Routes](code/routes/web.php)
* Using Repositories, Instead of Models
* Concatenated & minified CSS and JS
* [Icon fonts](code/resources/assets/fontello)
