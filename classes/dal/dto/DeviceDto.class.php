<?php

require_once (FRAMEWORK_PATH . "/dal/dto/AbstractDto.class.php");

/**
 * AdminDto class is extended class from AbstractDto.
 *
 * @author	Arman Tshitoyan
 */
class DeviceDto extends AbstractDto {

    // Map of DB value to Field value
    protected $mapArray = array(
        "id" => "id",
        "serial_number" => "serialNumber",
        "title" => "title",
        "statistics_page_passcode" => "statisticsPagePasscode",
        "reset_counter_button" => "resetCounterButton",
        "amd_100_qty" => "amd100Qty",
        "amd_200_qty" => "amd200Qty",
        "amd_500_qty" => "amd500Qty",
        "last_ping" => "lastPing",
        "is_busy" => "isBusy",
        "server_ping_url" => "serverPingUrl",
        "server_image_post_url" => "serverImagePostUrl",
        "camera_available" => "cameraAvailable",
        "not_working" => "notWorking",
        "server_host" => "serverHost"
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