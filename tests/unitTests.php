<?php
require_once dirname(dirname(__FILE__)) . "../vendor/autoload.php";
require('../customer.php');

use PHPUnit\Framework\TestCase;

class CustomerStatementTest extends TestCase
{
    public function testRegularTypeWith1Day(){
       
        $blcakPanther = new Movie("Blcak Panther",Movie::REGULAR);
        $blcakPantherRental = new Rental($blcakPanther,1);
        $customer = new Customer("Shahab Gheysari");
        $customer->addRental($blcakPantherRental);  

        $this->assertSame(
            "Rental Record for Shahab Gheysari\n\tBlcak Panther\t2\nAmount owed is 2\nYou earned 1 frequent renter point",
            $customer->statement()
        );

    }

    public function testHtmlStatementRegularTypeWith2Day(){
       
        $blcakPanther = new Movie("Blcak Panther",Movie::REGULAR);
        $blcakPantherRental = new Rental($blcakPanther,2);
        $customer = new Customer("Shahab Gheysari");
        $customer->addRental($blcakPantherRental);  

        $this->assertSame(
            "<H1>Rentals for <EM>Shahab Gheysari</EM></H1><P>Blcak Panther: 2<BR><P>You owe <EM>2</EM><P>On this rental you earned <EM>1</EM> frequent renter points<P>",
            $customer->htmlStatement()
        );

    }

    public function testChildrenTypeWith1Day(){

        $hereditary = new Movie("Hereditary",Movie::CHILDRENS);
        $hereditaryRental = new Rental($hereditary,1);
        $customer = new Customer("Shahab Gheysari");
        $customer->addRental($hereditaryRental);

        $this->assertSame(
            "Rental Record for Shahab Gheysari\n\tHereditary\t1.5\nAmount owed is 1.5\nYou earned 1 frequent renter point",
            $customer->statement()
        );
    }

    public function testNewReleaseTypeWith1Day(){

        $deadPool2 = new Movie("Dead Pool 2",Movie::NEW_RELEASE);
        $deadPool2Rental = new Rental($deadPool2,1);
        $customer = new Customer("Shahab Gheysari");
        $customer->addRental($deadPool2Rental);

        $this->assertSame(
            "Rental Record for Shahab Gheysari\n\tDead Pool 2\t3\nAmount owed is 3\nYou earned 1 frequent renter point",
            $customer->statement()
        );
    }

    public function testTypesWithVariousDays(){

        //Movies
        $blcakPanther = new Movie("Blcak Panther",Movie::REGULAR);
        $aQuietPlace = new Movie("A Quiet Place",Movie::REGULAR);
        $deadPool2 = new Movie("Dead Pool 2",Movie::NEW_RELEASE);
        $hereditary = new Movie("Hereditary",Movie::CHILDRENS);
        $hotelTransylvania3 = new Movie("Hotel Transylvania 3",Movie::CHILDRENS);

        //Rentals
        $blcakPantherRental = new Rental($blcakPanther,2);
        $aQuietPlaceRental = new Rental($aQuietPlace,1);
        $deadPool2Rental = new Rental($deadPool2,1);
        $hereditaryRental = new Rental($hereditary,1);
        $hotelTransylvania3Rental = new Rental($hotelTransylvania3,1);

        //Customer
        $customer = new Customer("Shahab Gheysari");
        $customer->addRental($blcakPantherRental);
        $customer->addRental($aQuietPlaceRental);
        $customer->addRental($deadPool2Rental);
        $customer->addRental($hereditaryRental);
        $customer->addRental($hotelTransylvania3Rental);

        $this->assertSame(
            "Rental Record for Shahab Gheysari\n\tBlcak Panther\t2\n\tA Quiet Place\t2\n\tDead Pool 2\t3\n\tHereditary\t1.5\n\tHotel Transylvania 3\t1.5\nAmount owed is 10\nYou earned 5 frequent renter point",
            $customer->statement()
        );
    }

    public function testHtmlStatementTypesWithVariousDays(){

        //Movies
        $blcakPanther = new Movie("Blcak Panther",Movie::REGULAR);
        $aQuietPlace = new Movie("A Quiet Place",Movie::REGULAR);
        $deadPool2 = new Movie("Dead Pool 2",Movie::NEW_RELEASE);
        $hereditary = new Movie("Hereditary",Movie::CHILDRENS);
        $hotelTransylvania3 = new Movie("Hotel Transylvania 3",Movie::CHILDRENS);

        //Rentals
        $blcakPantherRental = new Rental($blcakPanther,2);
        $aQuietPlaceRental = new Rental($aQuietPlace,1);
        $deadPool2Rental = new Rental($deadPool2,1);
        $hereditaryRental = new Rental($hereditary,1);
        $hotelTransylvania3Rental = new Rental($hotelTransylvania3,1);

        //Customer
        $customer = new Customer("Shahab Gheysari");
        $customer->addRental($blcakPantherRental);
        $customer->addRental($aQuietPlaceRental);
        $customer->addRental($deadPool2Rental);
        $customer->addRental($hereditaryRental);
        $customer->addRental($hotelTransylvania3Rental);

        $this->assertSame(
            "<H1>Rentals for <EM>Shahab Gheysari</EM></H1><P>Blcak Panther: 2<BR>A Quiet Place: 2<BR>Dead Pool 2: 3<BR>Hereditary: 1.5<BR>Hotel Transylvania 3: 1.5<BR><P>You owe <EM>10</EM><P>On this rental you earned <EM>5</EM> frequent renter points<P>",
            $customer->htmlStatement()
        );
    }

     
}