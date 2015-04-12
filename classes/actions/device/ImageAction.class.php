<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");

/**
 * @author Karen Manukyan
 */
class ImageAction extends BaseAction {

    public function service() {
        if (!isset($_REQUEST['token'])) {
            $this->error(array('message' => "No Serial Number!"));
        }
        $token = $this->secure($_REQUEST['token']);
        $this->ok();
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

}

?>