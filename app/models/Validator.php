<?php

namespace app\models;

use Exception;

/**
 * Description of Validator
 *
 * @author Vera
 */
class Validator 
{
    /**
     * 
     * @param string $input
     * @return string
     * @throws Exception
     */
    public function Email($input)
    {
	$exp = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[_a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,4})$/";
               
	$res = preg_match($exp, $input);
        
        if(!$res) {
            
            throw new Exception('Enter valid email address!');
        }

        return $input;
    }
    
    /**
     * 
     * @param string $data
     * @return string
     */
    public function TestInput($data) 
    {
        $data = trim($data);
        $data = str_replace("'", '#', $data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
    
    /**
     * 
     * @param string $data
     * @return string
     * @throws Exception
     */
    public function Required($data) 
    {
        $data = $this->TestInput($data);
        
        if(!$data) {
            
            throw new Exception('Enter required fields!');
        }
        
        return $data;
    }

    /**
     *
     * @param string $password
     * @param string $cpassword
     * @return string
     * @throws Exception
     */
    public function Password($password, $cpassword)
    {
        if(!empty($password) && !empty($cpassword) && ($password == $cpassword)) {
            
            $password = $this->TestInput($password);
            $cpassword = $this->TestInput($cpassword);
            
            if (strlen($password) < 6) {
                
                throw new Exception("Your Password Must Contain At Least 6 Characters!");
            }
        }
        else {
            
            throw new Exception("Please, Check You've Entered Or Confirmed Your Password!");
        }

        return $password;
    }
}
