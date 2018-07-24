<?php
require_once "vendor/autoload.php";


//Movies
$blcakPanther = new Movie("Blcak Panther",Movie::REGULAR);
$aQuietPlace = new Movie("A Quiet Place",Movie::REGULAR);
$deadPool2 = new Movie("Dead Pool 2",Movie::NEW_RELEASE);
$hereditary = new Movie("Hereditary",Movie::CHILDRENS);
$hotelTransylvania3 = new Movie("Hotel Transylvania 3",Movie::CHILDRENS);

//Rentals
$blcakPantherRental = new Rental($blcakPanther,2);
$aQuietPlaceRental = new Rental($aQuietPlace,1);
$deadPool2Rental = new Rental($deadPool2,2);
$hereditaryRental = new Rental($hereditary,5);
$hotelTransylvania3Rental = new Rental($hotelTransylvania3,1);

//Customer
$customer = new Customer("Shahab Gheysari");
$customer->addRental($blcakPantherRental);
$customer->addRental($aQuietPlaceRental);
$customer->addRental($deadPool2Rental);
$customer->addRental($hereditaryRental);
$customer->addRental($hotelTransylvania3Rental);

echo $customer->statement();
echo $customer->htmlStatement();


?>