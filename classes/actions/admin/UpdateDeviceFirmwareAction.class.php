<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/DevicePendingActionsManager.class.php");

/**
 * @author Levon Naghashyan
 */
class UpdateDeviceFirmwareAction extends BaseAdminAction {

    public function service() {
        $deviceId = intval($_REQUEST['device_id']);
        $version = $this->secure($_REQUEST['version']);
        if (empty($version))
        {
            $version = "1.x";
        }
        $tmpFile = $_FILES['firmware']['tmp_name'];

        if (!is_file($tmpFile)) {
            $jsonArr = array('status' => "err",'message' => 'please select file!');
            echo "<script>var l= new parent.ngs.AdminUpdateDeviceFirmwareAction(); l.afterAction('" . json_encode($jsonArr) . "'); </script>";
            exit;
        }
        $name = $_FILES['firmware']['name'];
        $extension = explode('.', $name);
        $extension = end($extension);
        if ($extension !== 'jar') {
            $jsonArr = array('status' => "err", 'message' => 'Wrong file format!');
            echo "<script>var l= new parent.ngs.AdminUpdateDeviceFirmwareAction(); l.afterAction('" . json_encode($jsonArr) . "'); </script>";
            exit;
        }
        $fileName = uniqid() . '.jar';
        if (!is_dir(HTDOCS_TMP_DIR)) {
            mkdir(HTDOCS_TMP_DIR, 0777);
        }
        move_uploaded_file($tmpFile, HTDOCS_TMP_DIR . '/' . $fileName);
        $devicePendingActionsManager = DevicePendingActionsManager::getInstance();
        $jasonAction = new stdClass();
        $jasonAction->action = "update_firmware";
        $jasonAction->file_name = $fileName;
        $jasonAction->version = $version;
        $devicePendingActionsManager->addDeviceAction($deviceId, json_encode($jasonAction));
        $jsonArr = array('status' => "ok");
        echo "<script>var l= new parent.ngs.AdminUpdateDeviceFirmwareAction(); l.afterAction('" . json_encode($jsonArr) . "'); </script>";
    }

}

?>