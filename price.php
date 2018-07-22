<?php

abstract class Price{
    
    abstract function getPriceCode();

    public function getCharge($daysRented){
        $result = 0;
        
        switch($this->getPriceCode()){
            case Movie::REGULAR:
                $result += 2;
                if($daysRented > 2)
                    $result += ($daysRented - 2) * 1.5 ;
                break;
            case Movie::NEW_RELEASE:
                $result += $daysRented * 3;
                break;
            case Movie::CHILDRENS:
                $result += 1.5;
                if($daysRented > 3)
                    $result += ($daysRented - 3) * 1.5;
                break;
        }
        return $result;
    }
}

class ChildrensPrice extends Price {
    function getPriceCode() {
        return Movie::CHILDRENS;
    }
}

class NewReleasePrice extends Price {
    function getPriceCode() {
        return Movie::NEW_RELEASE;
    }
}

class RegularPrice extends Price {
    function getPriceCode() {
        return Movie::REGULAR;
    }
}