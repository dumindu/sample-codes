<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('state');
            $table->string('city');
            $table->char('country_code', 4);
            $table->string('telephone');
            $table->string('email');
        });

        Schema::create('room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('allowed_adult_count')->unsigned();
            $table->tinyInteger('allowed_children_count')->unsigned();
        });

        Schema::create('hotels_room_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hotel_id');
            $table->unsignedInteger('room_type_id');
            $table->tinyInteger('default_count')->unsigned();
            $table->decimal('default_price');
        });

        Schema::create('room_type_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
        });

        Schema::create('hotels_room_types_room_type_facilities', function (Blueprint $table) {
            $table->unsignedInteger('hotels_room_type_id');
            $table->unsignedInteger('room_type_facility_id');

            $table->primary(['hotels_room_type_id', 'room_type_facility_id'], 'hotels_room_types_room_type_facilities_primary');
        });

        Schema::create('hotels_room_types_calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hotels_room_type_id');
            $table->date('date');
            $table->tinyInteger('default_count')->unsigned();
            $table->decimal('default_price');
        });

        Schema::create('hotels_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->timestamps();
        });

        Schema::create('hotels_room_types_reservation_calendar', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hotels_reservation_id');
            $table->unsignedInteger('hotels_room_type_id');
            $table->date('date');
            $table->tinyInteger('count')->unsigned();
            $table->decimal('price');
            $table->text('instructions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('hotels');
        Schema::drop('room_types');
        Schema::drop('hotels_room_types');
        Schema::drop('room_type_facilities');
        Schema::drop('hotels_room_types_room_type_facilities');
        Schema::drop('hotels_room_types_calendar');
        Schema::drop('hotels_reservations');
        Schema::drop('hotels_room_types_reservation_calendar');
    }
}
