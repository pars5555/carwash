<?php

require_once (CLASSES_PATH . "/actions/carwash/BaseCarwashAction.class.php");

/**
 * @author Levon Naghashyan
 */
class LogoutAction extends BaseCarwashAction {

    public function service() {
        $user = $this->getUser();
        $this->sessionManager->removeUser($user, true);
        $this->redirect();
        exit;
    }
}

?>