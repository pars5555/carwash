<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class DeviceActionsPopupLoad extends BaseAdminLoad {

    public function load() {
        $deviceId = $_REQUEST['device_id'];
        $devicesManager = DevicesManager::getInstance();
        $deviceDto = $devicesManager->selectByPK($deviceId);
        $this->addParam('deviceDto', $deviceDto);
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/device_actions_popup.tpl";
    }

}

?>