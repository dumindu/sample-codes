<?php

use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testRoomTypesData = [
            [
                'id' => 1,
                'name' => 'Single Rooms',
                'allowed_adult_count' => 1,
                'allowed_children_count' => 0
            ],
            [
                'id' => 2,
                'name' => 'Double Rooms',
                'allowed_adult_count' => 2,
                'allowed_children_count' => 1
            ]
        ];
        $testHotelData = [
            'id' => 1,
            'name' => 'Hilton Pattaya',
            'address_line1' => '333/101 Moo 9, ',
            'address_line2' => 'Nong Prue, Bang Lamung,',
            'city' => 'Chon Buri',
            'state' => '',
            'country_code' => 'th',
            'telephone' => '+66 38 253 000',
            'email' => 'pattaya.sales@hilton.com'
        ];
        $testHotelsRoomTypesData = [
            [
                'hotel_id' => 1,
                'room_type_id' => 1,
                'default_count' => 2,
                'default_price' => 400000
            ],
            [
                'hotel_id' => 1,
                'room_type_id' => 2,
                'default_count' => 4,
                'default_price' => 600000
            ]
        ];

        DB::table('room_types')->insert($testRoomTypesData);
        DB::table('hotels')->insert($testHotelData);
        DB::table('hotels_room_types')->insert($testHotelsRoomTypesData);
    }
}
