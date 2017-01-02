# Question
## Fullstack test

### Scenario:
* We have a hotel that has two room types:
  * Double room : This has an inventory of 5 rooms
  * Single room : This has an inventory of 5 rooms
* All rooms are available for booking on all days.
* Prices and inventory are independent of each other on a daily basis.

### Task:
* Create a working single page app that allows updates to the calendar, persisting to the database
* The changes to price or inventory should stay changed even if you refresh the page.
* The Bulk Operations form should allow to update multiple days at once depending on the selected criteria.
* UI should be polished. Similar to the above screenshot.

###  Additional Points
* You’re allowed to use an existing framework.
* We’re looking for a functional page but equally important is clean code.
* We prefer if you can host it somewhere for us to test. However, we’re perfectly fine with sending us a zip file or repo link.



# Solution
## Instructions to test

* Clone repo
* Change DB configurations in .env 
* ```composer install```
* ```npm install```
* ```gulp --production``` to generate main styles and scripts
* ```php artisan migrate``` to run DB migrations

* DB Seeding

```
INSERT INTO `room_types` (`id`, `name`, `allowed_adult_count`, `allowed_children_count`) VALUES (NULL, 'Single Rooms', '1', '0'), (NULL, 'Double Rooms', '2', '1');
INSERT INTO `hotels` (`id`, `name`, `address_line1`, `address_line2`, `state`, `city`, `country_code`, `telephone`, `email`) VALUES (NULL, 'Hilton Pattaya', '333/101 Moo 9, ', 'Nong Prue, Bang Lamung,', '', 'Chon Buri', 'th', '+66 38 253 000', 'pattaya.sales@hilton.com');
INSERT INTO `hotels_room_types` (`id`, `hotel_id`, `room_type_id`, `default_count`, `default_price`) VALUES (NULL, '1', '1', '2', '400000'), (NULL, '1', '2', '4', '600000');
```

* Testable URL : /hotels/hilton-pattaya-1/issuance-calendar/2017-01
