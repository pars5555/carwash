<?php

require_once (FRAMEWORK_PATH . "/dal/dto/AbstractDto.class.php");

/**
 * AdminDto class is extended class from AbstractDto.
 *
 * @author	Arman Tshitoyan
 */
class DeviceCounterHistoryDto extends AbstractDto {

    // Map of DB value to Field value
    protected $mapArray = array(
        "id" => "id",
        "device_id" => "deviceId",
        "amd100_qty" => "amd100Qty",
        "amd200_qty" => "amd200Qty",
        "amd500_qty" => "amd500Qty",
        "datetime" => "datetime"
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