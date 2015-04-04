<?php
require_once (CLASSES_PATH . "/framework/AbstractManager.class.php");
require_once (CLASSES_PATH . "/dal/mappers/CarwashMapper.class.php");

class CarwashManager extends AbstractManager  {

    /**
     * @var singleton instance of class
     */
    private static $instance = null;

    /**
     * Initializes DB mappers
     *
    
     * @return
     */
    function __construct() {
            $this -> mapper = CarwashMapper::getInstance();           
    }

    /**
     * Returns an singleton instance of this class
     *
     * @param object $config
     * @param object $args
     * @return
     */
    public static function getInstance() {

        if (self::$instance == null) {
                self::$instance = new CarwashManager();
        }
        return self::$instance;
    }
	
    public function getByLoginPassword($login, $password) {        
        return $this->mapper->getByLoginPassword($login, $password);
    }
    
    public function updateUserHash($uId) {
        $hash = $this->generateHash($uId);
        $userDto = $this->mapper->createDto();
        $userDto->setId($uId);
        $userDto->setHash($hash);
        $this->mapper->updateByPK($userDto);
        return $hash;
    }
    
     public function generateHash($id) {
        return md5($id * time() * 19);
    }
     public function validate($id, $hash) {
        return $this->mapper->validate($id, $hash);
    }
    
}

?>