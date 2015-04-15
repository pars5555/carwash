<?php

require_once (CLASSES_PATH . "/loads/admin/BaseAdminLoad.class.php");
require_once (CLASSES_PATH . "/managers/DevicesManager.class.php");

/**
 *
 * @author Vahagn Sookiasian
 *
 */
class CarwashesLoad extends BaseAdminLoad {

    public function load() {
        $carwashManager = CarwashManager::getInstance();
        $carwashDtos = $carwashManager->selectAll();
        $this->addParam('carwashDtos', $carwashDtos);
    }

    public function getTemplate() {
        return TEMPLATES_DIR . "/admin/carwashes.tpl";
    }

}

?>