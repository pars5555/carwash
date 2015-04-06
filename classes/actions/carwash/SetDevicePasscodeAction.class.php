<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicePendingActionsManager.class.php");

/**
 * @author Levon Naghashyan
 */
class SetDevicePasscodeAction extends BaseCarwashAction {

    public function service() {
        $deviceId = intval($_REQUEST['device_id']);
        $passcode = $this->secure($_REQUEST['passcode']);
        $devicePendingActionsManager = DevicePendingActionsManager::getInstance();
        $jasonAction = new stdClass();
        $jasonAction->action = "set_statistics_page_passcode";
        $jasonAction->passcode = $passcode;
        $devicePendingActionsManager->addDeviceAction($deviceId, json_encode($jasonAction));
        $this->ok();
    }

}

?>