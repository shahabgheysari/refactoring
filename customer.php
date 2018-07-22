<?php
require("movie.php");
require("rental.php");

class Customer{
    private $_name;
    private $_rentals = array();

    function __construct($name){
        $this->_name = $name;
    }

    public function addRental($rental){
        array_push($this->_rentals,$rental);
    }

    public function getName(){
        return $this->_name;
    }

    public function statement(){
        $totalAmount = 0;
        $frequentRenterPoints = 0;
        $rentals = $this->_rentals;
        $result = "Rental Record for ".$this->getName()."\n";
        foreach($rentals as $each){
            $thisAmount = 0;
            $thisAmount = $this->amountFor($each);            
            // add frequent renter points
            $frequentRenterPoints++;
            // add bonus for a two day new release rental
            if(($each->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $each->getDaysRented() > 1)
                $frequentRenterPoints++;
            
            //show figures for this rental
            $result .= "\t".$each->getMovie()->getTitle()."\t".$thisAmount."\n";
            $totalAmount += $thisAmount;
        }

        //add footer lines
        $result .= "Amount owed is ".$totalAmount."\n";
        $result .= "You earned ".$frequentRenterPoints." frequent renter point";
        return $result;
    }

    private function amountFor($aRental){
        return $aRental->getCharge();
    }
}