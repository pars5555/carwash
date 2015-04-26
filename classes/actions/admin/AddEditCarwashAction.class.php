<?php

require_once (CLASSES_PATH . "/actions/admin/BaseAdminAction.class.php");
require_once (CLASSES_PATH . "/managers/CarwashManager.class.php");

/**
 * @author Levon Naghashyan
 */
class AddEditCarwashAction extends BaseAdminAction {

    public function service() {
        $carwashManager = CarwashManager::getInstance();
        $title = $this->secure($_REQUEST['title']);
        $login = $this->secure($_REQUEST['login']);
        $password = $this->secure($_REQUEST['password']);
        if ($_REQUEST['carwash_id'] > 0) {
            $carwash_id = intval($_REQUEST['carwash_id']);
            $carwashManager->editCarwash($carwash_id, $title, $login, $password);
        } else {
            $carwashManager->addCarwash($title, $login, $password);
        }
        $this->redirect('admin/carwashes');
    }

}

?>