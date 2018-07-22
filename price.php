<?php

abstract class Price{
    abstract function getPriceCode();
    abstract function getCharge($daysRented);

    public function getFrequentRenterPoints($daysRented){
        return 1;
    }
}

class ChildrensPrice extends Price {
    function getPriceCode() {
        return Movie::CHILDRENS;
    }

    public function getCharge($daysRented){
        $result = 1.5;
        if ($daysRented > 3)
            $result += ($daysRented - 3) * 1.5;
        return $result;
    }

}

class NewReleasePrice extends Price {
    function getPriceCode() {
        return Movie::NEW_RELEASE;
    }

    public function getCharge($daysRented){
        return $daysRented * 3;
    }

    public function getFrequentRenterPoints($daysRented){
        return ($daysRented > 1) ? 2 : 1;
    }
}

class RegularPrice extends Price {
    function getPriceCode() {
        return Movie::REGULAR;
    }

    public function getCharge($daysRented){
        $result = 2;
        if($daysRented > 2)
            $result += ($daysRented - 2) * 1.5 ;
        return $result;
    }
}