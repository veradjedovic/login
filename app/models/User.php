<?php

namespace app\models;

use app\models\Session as Session;
use app\models\Validator as Validator;
use Exception;

/**
 * Description of User
 *
 * @author Vera
 */
class User extends Model
{
        /**
         *
         * @var string
         */
	    public static $table = 'users';
        
        /**
         *
         * @var array
         */
	    public static $columns = array('name','surname','email', 'password', 'created_at', 'status');
        
        /**
         *
         * @var string
         */
	    public static $id_column = 'id';
        
        /**
         *
         * @var type 
         */
        public $name, $surname, $id, $email, $password, $created_at, $status;
        
        /**
         *
         * @var object
         */
        protected $validator;


        /**
         * Construct
         */
        public function __construct() 
        {
            $this->validator = new Validator();
        }

        /**
         *
         * @return array
         * @throws Exception
         */
        public function GetAllUsers()
        {
            $items = $this->GetAll('*', 'ORDER BY created_at DESC');

            if(!$items) {

                throw new Exception('Users not found.');
            }

            return $items;
        }

        /**
         *
         * @throws Exception
         */
        public function InsertUser()
        {
            if(!isset($_POST['tb_name']) && !isset($_POST['tb_surname']) && !isset($_POST['tb_email']) && !isset($_POST['tb_password']) && !isset($_POST['tb_cpassword'])) {
            
                throw new Exception('Data didn\'t arrive by contact form!');
            }

            $this->name = $this->validator->Required($_POST['tb_name']);
            $this->surname = $this->validator->Required($_POST['tb_surname']);
            $this->email = $this->validator->Email($_POST['tb_email']);
            $this->password = md5($this->validator->Password($_POST['tb_password'], $_POST['tb_cpassword']));
            $this->status = ADMIN;
            $this->created_at = date('Y-m-d H:i:s');
            $this->Insert();
            $this->setSessions();

            return $this;
        }
        
        /**
         * SetSessions method
         */
        public function setSessions()
        {
            Session::set("status", $this->status);
            Session::set("id", $this->id);
            Session::set("name", replace($this->name));
            Session::set("surname", replace($this->surname));
        }

        /**
         * Logout method
         */
        public function logout()
        {
            Session::stop();
            header("location:" . SITE_ROOT . "/login");
        }

        /**
         * 
         * @throws Exception
         */
        public function userLogin() 
        {
           if(!isset($_POST['tb_email']) && !isset($_POST['tb_password'])){
            
                throw new Exception("Credentials doesn't exists");
            }

            $email= $this->validator->Email($_POST['tb_email']);
            $password = md5($this->validator->Required($_POST['tb_password']));

            $admin = $this->login($email, $password);

            return $admin;
        }
        
        /**
         * 
         * @param string $email
         * @param string $password
         * @throws Exception
         * @return object
         */
        protected function login($email, $password)
        {
            $admins=$this->getAll("*", "WHERE email='{$email}' and password='{$password}' LIMIT 1");

            if(count($admins)!=1){
                throw new Exception('Invalid access!');
            } else {
                $admins[0]->setSessions();
                return $admins[0];
            }
        }
}
