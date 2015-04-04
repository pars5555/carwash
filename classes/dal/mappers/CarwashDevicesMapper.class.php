<?php

require_once (CLASSES_PATH . "/framework/dal/mappers/AbstractMapper.class.php");
require_once (CLASSES_PATH . "/dal/dto/CarwashDeviceDto.class.php");

/**
 *

 */
class CarwashDevicesMapper extends AbstractMapper {

    /**
     * @var table name in DB
     */
    private $tableName;

    /**
     * @var an instance of this class
     */
    private static $instance = null;

    /**
     * Initializes DBMS pointers and table name private class member.
     */
    function __construct() {
        // Initialize the dbms pointer.
        parent::__construct();

        // Initialize table name.
        $this->tableName = "carwash_devices";
    }

    /**
     * Returns an singleton instance of this class
     * @return
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new CarwashDevicesMapper();
        }
        return self::$instance;
    }

    /**
     * @see AbstractMapper::createDto()
     */
    public function createDto() {
        return new CarwashDeviceDto();
    }

    /**
     * @see AbstractMapper::getPKFieldName()
     */
    public function getPKFieldName() {
        return "id";
    }

    /**
     * @see AbstractMapper::getTableName()
     */
    public function getTableName() {
        return $this->tableName;
    }


}

?>