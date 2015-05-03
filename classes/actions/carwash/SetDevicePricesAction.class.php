<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicePendingActionsManager.class.php");

/**
 * @author Levon Naghashyan
 */
class SetDevicePricesAction extends BaseCarwashAction {

    public function service() {
        $deviceId = intval($_REQUEST['device_id']);
        $amd100ChargeSeconds= $this->secure($_REQUEST['amd100_charge_seconds']);
        $amd200ChargeSeconds= $this->secure($_REQUEST['amd200_charge_seconds']);
        $amd500ChargeSeconds= $this->secure($_REQUEST['amd500_charge_seconds']);
        $devicePendingActionsManager = DevicePendingActionsManager::getInstance();
        $jasonAction = new stdClass();
        $jasonAction->action = "set_prices";
        $jasonAction->amd100_charge_seconds = $amd100ChargeSeconds;
        $jasonAction->amd200_charge_seconds = $amd200ChargeSeconds;
        $jasonAction->amd500_charge_seconds = $amd500ChargeSeconds;
        $devicePendingActionsManager->addDeviceAction($deviceId, json_encode($jasonAction));
        $this->ok();
    }

}

?>