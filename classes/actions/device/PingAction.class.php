<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");
require_once(CLASSES_PATH . "/managers/DevicesManager.class.php");
require_once(CLASSES_PATH . "/managers/DevicePendingActionsManager.class.php");

/**
 * @author Karen Manukyan
 */
class PingAction extends BaseAction {

    public function service() {
        list($serialNumber, $deviceTitle, $statisticsPagePasscode, $resetCounterButton, $carwashId, $isBusy, $amd100Qty, $amd200Qty, $amd500Qty, $server_ping_url, $server_image_post_url,$camera_available) = $this->validateFields();
        $devicesManager = DevicesManager::getInstance();
        $devicesManager->updateDeviceParameters($serialNumber, $deviceTitle, $statisticsPagePasscode,$resetCounterButton, $carwashId, $isBusy, $amd100Qty, $amd200Qty, $amd500Qty, $server_ping_url, $server_image_post_url,$camera_available);
        $deviceDto = $devicesManager->getBySerialNumber($serialNumber);
        $deviceId = $deviceDto->getId();
        $devicePendingActionsManager = DevicePendingActionsManager::getInstance();
        $deviceNotSentActionObjects = $devicePendingActionsManager->getDeviceNotSentActionObjects($deviceId);
        $devicePendingActionsManager->setDeviceNotSentActionsAsSent($deviceId);
        $this->ok(array('actions' => $deviceNotSentActionObjects));
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

    public function validateFields() {
        if (!isset($_REQUEST['serial_number'])) {
            $this->error(array('message' => "No Serial Number!"));
        }
        $serialNumber = $this->secure($_REQUEST['serial_number']);
        $deviceTitle = $this->secure($_REQUEST['device_title']);
        $statisticsPagePasscode = $this->secure($_REQUEST['statistics_page_passcode']);
        $resetCounterButton= $this->secure($_REQUEST['reset_counter_button']);
        $server_ping_url= $this->secure($_REQUEST['server_ping_url']);
        $server_image_post_url= $this->secure($_REQUEST['server_image_post_url']);
        $camera_available= $this->secure($_REQUEST['camera_available']);
        if (!isset($_REQUEST['carwash_id'])) {
            $this->error(array('message' => "No Carwash id!"));
        }
        $carwashId = intval($_REQUEST['carwash_id']);
        if (!isset($_REQUEST['is_busy'])) {
            $this->error(array('message' => "No busy status!"));
        }
        $isBusy = intval($_REQUEST['is_busy']);
        if (!isset($_REQUEST['amd_100_qty'])) {
            $this->error(array('message' => "No AMD 100 Quantity!"));
        }
        $amd100Qty = intval($_REQUEST['amd_100_qty']);
        if (!isset($_REQUEST['amd_200_qty'])) {
            $this->error(array('message' => "No AMD 200 Quantity!"));
        }
        $amd200Qty = intval($_REQUEST['amd_200_qty']);
        if (!isset($_REQUEST['amd_500_qty'])) {
            $this->error(array('message' => "No AMD 500 Quantity!"));
        }
        $amd500Qty = intval($_REQUEST['amd_500_qty']);

        if (empty($serialNumber)) {
            $this->error(array('message' => "Empty Serial Number!"));
        }
        if ($carwashId <= 0) {
            $this->error(array('message' => "Wrong Carwash Id!"));
        }
        return array($serialNumber, $deviceTitle, $statisticsPagePasscode,$resetCounterButton, $carwashId, $isBusy, $amd100Qty, $amd200Qty, $amd500Qty, $server_ping_url, $server_image_post_url,$camera_available);
    }

}

?>