<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class DevicesLoad extends BaseAdminLoad {

    public function load() {
        $devicesManager = DevicesManager::getInstance();
        $devicesDtos = $devicesManager->selectAll();
        $devices = array();
        foreach ($devicesDtos as $deviceDto) {
            $devices[] = $devicesManager->convertToDeviceObject($deviceDto);
        }
        $this->addParam('devices', $devices);
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/devices.tpl";
    }

}

?>