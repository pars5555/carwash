<?php

require_once (CLASSES_PATH . "/loads/carwash/BaseCarwashLoad.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");
require_once (CLASSES_PATH . "/managers/CarwashDevicesManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class DevicesLoad extends BaseCarwashLoad{
    
    public function load() {
        $devicesManager = DevicesManager::getInstance();
        $carwashDevicesManager = CarwashDevicesManager::getInstance();
        $carwashDeviceDtos = $carwashDevicesManager->selectByField('carwash_id', $this->getUserId());
        $deviceIds = array();
        foreach ($carwashDeviceDtos  as $carwashDeviceDto ) {
            $deviceId = $carwashDeviceDto->getDeviceId();
            $deviceIds[] = $deviceId;
        }
        $devicesDtos = $devicesManager->selectByPKs($deviceIds);
        $this->addParam('devicesDtos', $devicesDtos);
        $this->addParam('page_name', "devices");
        
        
        
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/carwash/devices.tpl";
    }

}

?>