<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");
require_once(CLASSES_PATH . "/managers/DevicesManager.class.php");
require_once(CLASSES_PATH . "/managers/SessionManager.class.php");
require_once(CLASSES_PATH . "/security/users/CarwashUser.class.php");

/**
 * @author Karen Manukyan
 */
class PingAction extends BaseAction {

    public function service() {

        $serialNumber = $this->secure($_REQUEST['serial_number']);
        $carwashId = intval($_REQUEST['carwash_id']);
        $isBusy = intval($_REQUEST['is_busy']);
        $amd100Qty = intval($_REQUEST['amd_100_qty']);
        $amd200Qty = intval($_REQUEST['amd_200_qty']);
        $amd500Qty = intval($_REQUEST['amd_500_qty']);
        $this->validateFields($serialNumber, $carwashId, $isBusy, $amd100Qty, $amd200Qty, $amd500Qty);
        $devicesManager = DevicesManager::getInstance();
        $devicesManager->updateDeviceParameters($serialNumber, $carwashId, $isBusy, $amd100Qty, $amd200Qty, $amd500Qty);
        //$deviceDto = $devicesManager->getBySerialNumber($serialNumber);
        $this->ok();
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

    public function validateFields($serialNumber, $carwashId, $isBusy, $amd100Qty, $amd200Qty, $amd500Qty) {
        if (empty($serialNumber)) {
            $this->error(array('message' => "Empty Serial Number!"));
        }
        if ($carwashId <= 0) {
            $this->error(array('message' => "Wrong Carwash Id!"));
        }
    }

}

?>