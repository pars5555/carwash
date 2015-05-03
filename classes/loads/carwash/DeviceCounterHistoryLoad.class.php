<?php

require_once (CLASSES_PATH . "/loads/carwash/BaseCarwashLoad.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");
require_once (CLASSES_PATH . "/managers/CarwashDevicesManager.class.php");
require_once (CLASSES_PATH . "/managers/DeviceCounterHistoryManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class DeviceCounterHistoryLoad extends BaseCarwashLoad {

    public function load() {
        $devicesManager = DevicesManager::getInstance();
        $carwashDevicesManager = CarwashDevicesManager::getInstance();
        $carwashDeviceDtos = $carwashDevicesManager->selectByField('carwash_id', $this->getUserId());
        $deviceIds = array();
        foreach ($carwashDeviceDtos as $carwashDeviceDto) {
            $deviceId = $carwashDeviceDto->getDeviceId();
            $deviceIds[] = $deviceId;
        }
        $devicesDtos = $devicesManager->selectByPKs($deviceIds);
        $this->addParam('devicesDtos', $devicesDtos);
        
        $selectedDeviceId  = 0;
        if (isset($this->args[0]))
        {
            $selectedDeviceId = intval($this->args[0]);
            $selectedDevicesDto = $devicesManager->selectByPK($selectedDeviceId);
            $this->addParam("selectedDeviceDto", $selectedDevicesDto);
            
            $deviceCounterHistoryManager = DeviceCounterHistoryManager::getInstance();
            $deviceCounterHistory = $deviceCounterHistoryManager ->selectByField('device_id', $selectedDeviceId, "datetime", false);
            $this->addParam('deviceCounterHistory', $deviceCounterHistory);
        }
        
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/carwash/device_counter_history.tpl";
    }

}

?>