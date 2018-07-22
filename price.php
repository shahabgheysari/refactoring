<?php

abstract class Price{
    abstract function getPriceCode();
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