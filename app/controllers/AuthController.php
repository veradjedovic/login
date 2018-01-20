<?php

namespace app\controllers;

use app\models\User as User;
use Exception as Exception;

/**
 * Description of AuthController
 *
 * @author Vera
 */
class AuthController extends Controller
{
    /**
     *
     * @var string
     */
    public $layout = '';
    
    /**
     *
     * @var object
     */
    protected $user;
    

    /**
     * Construct
     */
    public function __construct() 
    {
        $this->user = new User();
    }
    
    
    /**
     * GetLogin method
     */
    public function getlogin()
    {

        $this->view('login');
    }
    
    /**
     * 
     * @return json/views
     */
    public function postlogin() 
    {
        try {

            $this->user->userLogin();
                
            return json_encode(['error'=> false, 'redirect' => SITE_ROOT . '/admin/']);
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => $ex->getMessage(), 'error'=> true]); 
            
        }
    }
    
    /**
     * 
     * @return json/views
     */
    public function getlogout() 
    {
        try {

            $this->user->logout();
            
        } catch (Exception $ex) {
            
            return json_encode(['message' => 'Error', 'error'=> true]);
        }
    }
}
