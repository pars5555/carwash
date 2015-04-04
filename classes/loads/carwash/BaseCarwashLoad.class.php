<?php

require_once (CLASSES_PATH . "/loads/BaseValidLoad.class.php");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SendchatLoad
 */
abstract class BaseCarwashLoad extends BaseValidLoad {

    public function onNoAccess() {
        $this->redirect('login');
    }

    public function getRequestGroup() {
        return RequestGroups::$carwashRequest;
    }

}

?>