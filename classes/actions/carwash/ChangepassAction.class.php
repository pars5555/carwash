<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");
require_once (CLASSES_PATH . "/managers/CarwashManager.class.php");

/**
 * @author Levon Naghashyan
 */
class ChangepassAction extends BaseCarwashAction {

    public function service() {
        $password = $this->secure($_REQUEST['password']);
        $newPassword = $this->secure($_REQUEST['new_password']);
        $repeatNewPassword = $this->secure($_REQUEST['repeat_new_password']);
        $carwashDto = $this->getCustomer();
        if ($carwashDto->getPassword() != $password) {
            $_SESSION['error_message'] = "Wrong Password!";
            $this->redirect("changepass");
        }
        if ($newPassword !== $repeatNewPassword) {
            $_SESSION['error_message'] = "Repeat Password does not match!";
            $this->redirect("changepass");
        }
        $carwashManager = CarwashManager::getInstance();
        $carwashDto->setPassword($newPassword);
        $carwashManager->updateByPk($carwashDto);
        $_SESSION['success_message'] = "Password successfullt changed";
        $this->redirect("changepass");
    }

}

?>