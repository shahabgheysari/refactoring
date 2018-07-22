<?php 

class Movie{
    
    public const CHILDRENS = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private $_title;
    private $_pricecCode;

    function __construct($title, $priceCode){
        $this->_title = $title;
        $this->_priceCode = $priceCode;
    }

    public function getPriceCode(){
        return $this->_priceCode;
    }

    public function setPriceCode($priceCode){
        $this->_priceCode = $priceCode;
    }

    public function getTitle(){
        return $this->_title;
    }

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

    public function getFrequentRenterPoints($daysRented){
        if(($this->getPriceCode() == Movie::NEW_RELEASE) && $daysRented > 1)
            return 2;
        else 
            return 1;
    }

}