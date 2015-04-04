<?php

require_once (CLASSES_PATH . "/framework/AbstractAction.class.php");
require_once (CLASSES_PATH . "/exceptions/NgsException.class.php");

/**
 * @author Vahagn Sookiasian
 */
abstract class BaseAction extends AbstractAction {

    public function onNoAccess() {
        $this->redirect('');
    }

    public function error($errorParams = array()) {
        $errorParams['status'] = "err";
        echo json_encode($errorParams);
        exit;
    }

    public function ok($params = array()) {
        $params['status'] = "ok";
        echo json_encode($params);
        exit;
    }

}

?>