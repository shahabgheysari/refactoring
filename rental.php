<?php

class Rental{
    
    private $_movie;
    private $_daysRented;

    function __construct($movie, $daysRented){
        $this->_movie = $movie;
        $this->_daysRented = $daysRented;
    }

    public function getDaysRented(){
        return $this->_daysRented;
    }

    public function getMovie(){
        return $this->_movie;
    }

    public function getFrequentRenterPoints(){
        if(($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE) && $this->getDaysRented() > 1)
            return 2;
        else 
            return 1;
    }

    public function getCharge(){
        return $this->_movie->getCharge($this->_daysRented);
    }

}