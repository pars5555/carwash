<?php

require_once (CLASSES_PATH . "/loads/carwash/BaseCarwashLoad.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class ChangepassLoad extends BaseCarwashLoad{
    
    public function load() {
        $this->initErrorMessages();
        $this->initSucessMessages();
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/carwash/changepass.tpl";
    }

}

?>