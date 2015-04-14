<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");

/**
 * @author Levon Naghashyan
 */
class UpdateDevicesInfoAction extends BaseAdminAction {

    public function service() {
        $devicesManager = DevicesManager::getInstance();
        $devicesDtos = $devicesManager->selectAll();
        $devices = array();
        foreach ($devicesDtos as $deviceDto) {
            $devices[] = $devicesManager->convertToDeviceObject($deviceDto);
        }
        $this->ok(array('devices' => $devices));
    }

}

?>