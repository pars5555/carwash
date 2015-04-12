<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");

/**
 * @author Vahagn Sookiasian
 * @site http://naghashyan.com
 * @mail vahagnsookaisyan@gmail.com
 * @year 2010-2012
 */
class GetImageAction extends BaseAction {

    public function service() {
        $serialNumber = $this->args[0];
        $dir = IMG_ROOT_DIR . '/devices/' . $serialNumber;
        $files = glob($dir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                $this->showImage($file);
                break;
            }
        }
    }

    private function showImage($picture) {
        if (file_exists($picture)) {
            header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header('Content-type: image/jpeg');
            readfile($picture);
        }
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

}

?>