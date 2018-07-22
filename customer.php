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
            //show figures for this rental
            $result .= "\t".$each->getMovie()->getTitle()."\t".$each->getCharge()."\n";
        }

        //add footer lines
        $result .= "Amount owed is ".$this->getTotalCharge()."\n";
        $result .= "You earned ".$this->getTotalFrequentRenterPoints()." frequent renter point";
        return $result;
    }

    public function getTotalCharge(){
        $result = 0;
        foreach($this->_rentals as $each){
            $result += $each->getCharge();
        }
        return $result;
    }

    public function getTotalFrequentRenterPoints(){
        $result = 0;
        foreach($this->_rentals as $each){
            $result += $each->getFrequentRenterPoints();
        }
        return $result;
    }

    public function htmlStatement(){
        $result = "<H1>Rentals for <EM>".$this->getName()."</EM></H1><P>";
        foreach($this->_rentals as $each){
            //show figures for each rental
            $result .= $each->getMovie()->getTitle().": ".$each->getCharge()."<BR>";
        }
        //add footer lines
        $result .= "<P>You owe <EM>".$this->getTotalCharge()."</EM><P>";
        $result .= "On this rental you earned <EM>".$this->getTotalFrequentRenterPoints()."</EM> frequent renter points<P>";
        return $result;
    }
}