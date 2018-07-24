<?php

class Movie{
    
    public const CHILDRENS = 2;
    public const REGULAR = 0;
    public const NEW_RELEASE = 1;

    private $_title;
    private $_price;

    function __construct($title, $priceCode){
        $this->_title = $title;
        $this->setPriceCode($priceCode);
    }

    public function getPriceCode(){
        return $this->_price->getPriceCode();
    }

    public function setPriceCode($arg){
        switch($arg){
            case $this::REGULAR:
                $this->_price = new RegularPrice();
                break;
            case $this::CHILDRENS:
                $this->_price = new ChildrensPrice();
                break;
            case $this::NEW_RELEASE:
                $this->_price = new NewReleasePrice();
                break;
            default:
                throw new Exception("Incorrect Price Code");
        }
    }

    public function getTitle(){
        return $this->_title;
    }

    public function getCharge($daysRented){
        return $this->_price->getCharge($daysRented);
    }

    public function getFrequentRenterPoints($daysRented){
       return $this->_price->getFrequentRenterPoints($daysRented);
    }

}