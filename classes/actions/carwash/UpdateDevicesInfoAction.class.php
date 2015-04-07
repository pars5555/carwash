<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");

/**
 * @author Levon Naghashyan
 */
class UpdateDevicesInfoAction extends BaseCarwashAction {

    public function service() {

        $devicesManager = DevicesManager::getInstance();
        $carwashDevicesManager = CarwashDevicesManager::getInstance();
        $carwashDeviceDtos = $carwashDevicesManager->selectByField('carwash_id', $this->getUserId());
        $deviceIds = array();
        foreach ($carwashDeviceDtos as $carwashDeviceDto) {
            $deviceId = $carwashDeviceDto->getDeviceId();
            $deviceIds[] = $deviceId;
        }
        $devicesDtos = $devicesManager->selectByPKs($deviceIds);
        $devices = array();
        foreach ($devicesDtos as $deviceDto) {
            $devices[] = $devicesManager->convertToDeviceObject($deviceDto);
        }
        $this->ok(array('devices' => $devices));
    }

}

?>