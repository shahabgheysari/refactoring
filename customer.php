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
            $thisAmount = $each->getCharge();            
            // add frequent renter points
            $frequentRenterPoints += $each->getFrequentRenterPoints();
            
            //show figures for this rental
            $result .= "\t".$each->getMovie()->getTitle()."\t".$each->getCharge()."\n";
        }

        //add footer lines
        $result .= "Amount owed is ".$this->getTotalCharge()."\n";
        $result .= "You earned ".$frequentRenterPoints." frequent renter point";
        return $result;
    }

    public function getTotalCharge(){
        $result = 0;
        $rentals = $this->_rentals;
        foreach($rentals as $each){
            $result += $each->getCharge();
        }
        return $result;
    }

}