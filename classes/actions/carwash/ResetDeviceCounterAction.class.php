<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicePendingActionsManager.class.php");

/**
 * @author Levon Naghashyan
 */
class ResetDeviceCounterAction extends BaseCarwashAction {

    public function service() {
        $deviceId = intval($_REQUEST['device_id']);
        $devicePendingActionsManager = DevicePendingActionsManager::getInstance();
        $jasonAction = new stdClass();
        $jasonAction ->action = "reset_counter";
        $devicePendingActionsManager->addDeviceAction($deviceId, json_encode($jasonAction));
        $this->ok();
    }

}

?>