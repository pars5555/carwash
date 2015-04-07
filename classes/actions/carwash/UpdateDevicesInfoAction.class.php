<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");

/**
 * @author Levon Naghashyan
 */
class UpdateDevicesInfoAction extends BaseCarwashAction {

    public function service() {

        $devicesManager = DevicesManager::getInstance();
        $carwashDevicesManager = CarwashDevicesManager::getInstance();
        $carwashDeviceDtos = $carwashDevicesManager->selectByField('carwash_id', $this->getUserId());
        $deviceIds = array();
        foreach ($carwashDeviceDtos as $carwashDeviceDto) {
            $deviceId = $carwashDeviceDto->getDeviceId();
            $deviceIds[] = $deviceId;
        }
        $devicesDtos = $devicesManager->selectByPKs($deviceIds);
        $devices = array();
        $datetime = new DateTime('-10 seconds');
        $tenSecondsBeforeNow = $datetime->format("Y-m-d H:i:s");
        foreach ($devicesDtos as $deviceDto) {
            $device = new stdClass();
            $device->id = $deviceDto->getId();
            $deviceIsOn = $tenSecondsBeforeNow < $deviceDto->getLastPing() && !empty($deviceDto->getLastPing());
            if (!$deviceIsOn) {
                $device->status = 'off';
            }else
            {
                $device->status = $deviceDto->getIsBusy()==1?'busy':'free';                
            }
            $totalAmd = $deviceDto->getAmd100Qty() * 100 + $deviceDto->getAmd200Qty() * 200 + $deviceDto->getAmd500Qty() * 500;
            $device->totalAmd = $totalAmd;
            $device->title = $deviceDto->getTitle();
            $device->passcode= $deviceDto->getStatisticsPagePasscode();
            
        }
        $this->ok(array('devices' => $device));
    }

}

?>