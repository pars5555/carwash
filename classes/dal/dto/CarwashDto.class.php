<?php

require_once (FRAMEWORK_PATH . "/dal/dto/AbstractDto.class.php");

/**
 * AdminDto class is extended class from AbstractDto.
 *
 * @author	Arman Tshitoyan
 */
class CarwashDto extends AbstractDto {

    // Map of DB value to Field value
    protected $mapArray = array(
        "id" => "id",
        "title" => "title",
        "login" => "login",
        "password" => "password",
        "hash" => "hash"
    );

    // constructs class instance
    public function __construct() {
        
    }

    // returns map array
    public function getMapArray() {
        return $this->mapArray;
    }

}

?>