<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");

/**
 * @author Karen Manukyan
 */
class ImageAction extends BaseAction {

    public function service() {
        if (!isset($_REQUEST['serial_number'])) {
            $this->error(array('message' => "No Serial Number!"));
        }
        $serialNumber = $this->secure($_REQUEST['serial_number']);
        file_put_contents("D:\\xxx.txt", $serialNumber, FILE_APPEND);
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

}

?>