<?php

require_once(CLASSES_PATH . "/security/UserGroups.class.php");
require_once(CLASSES_PATH . "/security/users/AuthenticateUser.class.php");
require_once (CLASSES_PATH . "/managers/CarwashManager.class.php");

/**
 * User class for free customers.
 *
 * @author Vahagn Sookiasian
 */
class CarwashUser extends AuthenticateUser {

    /**
     * Creates en instance of free customer user class and
     * initializes class members necessary for validation.
     *
     * @param object $adminId
     * @return
     */
    public function __construct($id) {
        parent::__construct($id);
        $this->setCookieParam("ut", UserGroups::$CARWASH);
    }

    public function setUniqueId($uniqueId, $updateDb = true) {
        if ($updateDb) {
            $uniqueId = CarwashManager::getInstance()->updateUserHash($this->getId());
        }
        $this->setCookieParam("uh", $uniqueId);
    }

    /**
     * Validates user credentials
     *
     * @return TRUE - if validation passed, and FALSE - otherwise
     */
    public function validate($uniqueId = false) {
        if (empty($uniqueId)) {
            $uniqueId = $this->getUniqueId();
        }
        $validatedUser = CarwashManager::getInstance()->validate($this->getId(), $uniqueId);
        if (!isset($validatedUser)) {
            return false;
        }
        return true;
    }

}

?>