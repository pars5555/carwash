<?php

require_once(CLASSES_PATH . "/actions/BaseAction.class.php");

/**
 * @author Karen Manukyan
 */
class ImageAction extends BaseAction {

    public function service() {
        if (!isset($_REQUEST['token'])) {
            $this->error(array('message' => "No Serial Number!"));
        }
        $token = $this->secure($_REQUEST['token']);
        $this->saveImage($token);

        $this->ok();
    }

    public function getRequestGroup() {
        return RequestGroups::$guestRequest;
    }

    public function saveImage($token) {
        $file_name = $_FILES['uploadedfile']['name'];
        $tmp_name = $_FILES['uploadedfile']['tmp_name'];
        $file_size = $_FILES['uploadedfile']['size'];

        $dir = IMG_ROOT_DIR . "/devices/";
        if (!is_dir($dir)) {
            mkdir($dir, 0777);
        }
        $dir = IMG_ROOT_DIR . "/devices/" . $token;
        if (!is_dir($dir)) {
            mkdir($dir, 0777);
        }
        $files = glob($dir . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
        move_uploaded_file($tmp_name, $dir . '/' . uniqid() . '.jpg');
    }

}

?>