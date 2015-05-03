<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicePendingActionsManager.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");
require_once (CLASSES_PATH . "/managers/DeviceCounterHistoryManager.class.php");

/**
 * @author Levon Naghashyan
 */
class ResetDeviceCounterAction extends BaseCarwashAction {

    public function service() {
        $deviceId = intval($_REQUEST['device_id']);
        $devicesManager = DevicesManager::getInstance();
        $deviceDto = $devicesManager->selectByPK($deviceId);
        if (isset($deviceDto)) {
            $deviceCounterHistoryManager = DeviceCounterHistoryManager::getInstance();
            $devicePendingActionsManager = DevicePendingActionsManager::getInstance();
            $jasonAction = new stdClass();
            $jasonAction->action = "reset_counter";
            $devicePendingActionsManager->addDeviceAction($deviceId, json_encode($jasonAction));
            $deviceCounterHistoryManager->addRow($deviceId, $deviceDto->getAmd100Qty(),$deviceDto->getAmd200Qty(),$deviceDto->getAmd500Qty());
            $devicesManager->resetDeviceCounter($deviceId);
            $this->ok();
        }
        $this->error();
    }

}

?>