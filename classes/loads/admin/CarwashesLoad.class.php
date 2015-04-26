<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class CarwashesLoad extends BaseAdminLoad {

    public function load() {
        $carwashManager = CarwashManager::getInstance();
        $devicesManager = DevicesManager::getInstance();
        $devicesDtos = $devicesManager->selectAll();
        $devicesDtosMappedById = $devicesManager->mapDtosById($devicesDtos);
        $carwashDevicesManager = CarwashDevicesManager::getInstance();
        $carwashDtos = $carwashManager->selectAll();
        $this->addParam('carwashDtos', $carwashDtos);
        $carwashDeviceIdsArray = array();
        foreach ($carwashDtos as $carwashDto) {
            $carwashId = $carwashDto->getId();
            $carwashDeviceIdsArray[$carwashId] = $carwashDevicesManager->getCarwashDevicesIdsArray($carwashId);
        }
        $this->addParam("carwashDeviceIdsArray", $carwashDeviceIdsArray);
        $this->addParam("allDevicesMappedById", $devicesDtosMappedById);
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/carwashes.tpl";
    }

}

?>