<?php

require_once (CLASSES_PATH . "/framework/AbstractManager.class.php");
require_once (CLASSES_PATH . "/dal/mappers/DevicePendingActionsMapper.class.php");

class DevicePendingActionsManager extends AbstractManager {

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
        $this->mapper = DevicePendingActionsMapper::getInstance();
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
            self::$instance = new DevicePendingActionsManager();
        }
        return self::$instance;
    }

    public function addDeviceAction($deviceId, $jsonAction) {
        $createDto = $this->createDto();
        $createDto->setDeviceId($deviceId);
        $createDto->setJsonAction($jsonAction);
        $createDto->setSent(0);
        $createDto->setDatetime(date('Y-m- H:i:s'));
        return $this->insertDto($createDto);
    }

    public function getDeviceNotSentActionObjects($deviceId) {
        $dtos = $this->mapper->getDeviceNotSentActions($deviceId);
        $actionBojects = array();
        foreach ($dtos as $dto) {
            $actionBojects[] = json_decode($dto->getJsonAction());
        }
        return $actionBojects;
    }

    public function setDeviceNotSentActionsAsSent($deviceId) {
        $dtos = $this->selectByField('device_id', $deviceId);
        foreach ($dtos as $dto) {
            if ($dto->getSent() == 0) {
                $dto->setSent(1);
                $this->updateByPk($dto);
            }
        }
    }

}

?>