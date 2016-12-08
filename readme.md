#Instructions

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