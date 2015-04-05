<?php

require_once (CLASSES_PATH . "/loads/main/BaseGuestLoad.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class HomeLoad extends BaseGuestLoad{
    
    public function load() {
        if ($this->getUserLevel() === UserGroups::$CARWASH)
        {
            $this->redirect('devices');
        }
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/main/home.tpl";
    }

}

?>