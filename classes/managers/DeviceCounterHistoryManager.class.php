<?php

require_once (CLASSES_PATH . "/framework/AbstractManager.class.php");
require_once (CLASSES_PATH . "/dal/mappers/DeviceCounterHistoryMapper.class.php");

class DeviceCounterHistoryManager extends AbstractManager {

    /**
     * @var singleton instance of class
     */
    private static $instance = null;

    /**
     * Initializes DB mappers
     *

     * @return
     */
    function __construct() {
        $this->mapper = DeviceCounterHistoryMapper::getInstance();
    }

    /**
     * Returns an singleton instance of this class
     *
     * @param object $config
     * @param object $args
     * @return
     */
    public static function getInstance() {

        if (self::$instance == null) {
            self::$instance = new DeviceCounterHistoryManager();
        }
        return self::$instance;
    }

    public function addRow($deviceId, $amd100Qty, $amd200Qty, $amd500Qty)
    {
        $createDto = $this->createDto();
        $createDto ->setDeviceId($deviceId);
        $createDto ->setAmd100Qty($amd100Qty);
        $createDto ->setAmd200Qty($amd200Qty);
        $createDto ->setAmd500Qty($amd500Qty);
        $createDto ->setDatetime(date('Y-m-d H:i:s'));
        return $this->insertDto($createDto);
    }

}

?>