<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicePendingActionsManager.class.php");

/**
 * @author Levon Naghashyan
 */
class SetDeviceConfigVariableAction extends BaseCarwashAction {

    public function service() {
        $deviceId = intval($_REQUEST['device_id']);
        $variableName = $this->secure($_REQUEST['variable_name']);
        $value = $this->secure($_REQUEST['value']);
        $devicePendingActionsManager = DevicePendingActionsManager::getInstance();
        $jasonAction = new stdClass();
        $jasonAction->action = "set_config_param";
        $jasonAction->variable_name = $variableName;
        $jasonAction->value = $value;
        $devicePendingActionsManager->addDeviceAction($deviceId, json_encode($jasonAction));
        $this->ok();
    }

}

?>