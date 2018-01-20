<?php 

namespace app\controllers;

use app\models\User as User;
use Exception as Exception;


/**
 * Description of UserController
 *
 * @author Vera
 */
class UserController extends Controller
{
    /**
     *
     * @var string
     */
    public $layout = 'admin';

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
     * Index method
     */
    public function index()
    {
        try {

            $this->view('home');

        } catch (Exception $ex) {

            $this->views('home', ['Exception' => $ex->getMessage()]);

        }
    }

    /**
     * AllUsers method
     */
    public function AllUsers()
    {
        try {
            $users = $this->user->GetAllUsers();

            $this->view('allUsers', ['users' => $users]);

        } catch (Exception $ex) {

            $this->views('allUsers', ['message' => $ex->getMessage()]);

        }
    }

    /**
     * Update method
     */
    public function insert()
    {
        try {   

            $this->user->InsertUser();
                           
            return json_encode(['error'=> false, 'redirect' => SITE_ROOT . '/admin/']);
        
        } catch (Exception $ex) {

            return json_encode(['message' => $ex->getMessage(), 'error'=> true]);
            
        }
    }  
}