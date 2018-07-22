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

}