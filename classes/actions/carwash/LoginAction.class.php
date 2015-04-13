<?php

require_once(CLASSES_PATH . "/framework/AbstractAction.class.php");
require_once(CLASSES_PATH . "/managers/CarwashManager.class.php");
require_once(CLASSES_PATH . "/managers/SessionManager.class.php");
require_once(CLASSES_PATH . "/security/users/CarwashUser.class.php");
/**
 * @author Karen Manukyan
 */
class LoginAction extends AbstractAction {

    public function service() {

        $login = $this->secure($_REQUEST['login']);
        $password = $this->secure($_REQUEST['password']);
        
        $carwashManager = CarwashManager::getInstance();
        $carwashDto = $carwashManager->getByLoginPassword($login, $password);  
        if ($carwashDto) {
            $user = new CarwashUser($carwashDto->getId());  
            $user->setUniqueId($carwashDto->getHash());
            $this->sessionManager->setUser($user, true, true);
        } else {
            $_SESSION['error_message'] = 'Wrong Login/Password!';
            $this->redirect('login');
        }
        $this->redirect('devices');
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

}

?>