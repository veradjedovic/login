<?php

namespace app\models;

use app\models\Database as Database;
use Exception;

/**
 * Abstract Class Model
 *
 * @author Vera
 */
abstract class Model 
{
    /**
     *
     * @var string
     */
	public static $table = '';
        
    /**
     *
     * @var array
     */
	public static $columns = array();
        
    /**
     *
     * @var string
     */
	public static $id_column = '';

	
    /**
     *
     * @param int $id
     * @return object
     * @throws Exception
     */
	public function GetById($id)
	{
		$db = Database::GetConnection();
		$res = mysqli_query($db, "select * from " . static::$table . " where " . static::$id_column . " = {$id}");
                
        if(!$res) {
                    
            throw new Exception('Object not founded.');
        }
                
        $item = mysqli_fetch_object($res, get_called_class());
                
        if(!$item) {
                    
            throw new Exception('Object is not founded.');
        }
               
		return $item;
	}

    /**
     *
     * @param string $fields
     * @param string $filter
     * @return array
     * @throws Exception
     */
	public function GetAll($fields = "*", $filter = "")
	{
		$db = Database::GetConnection();
		$res = mysqli_query($db, "select " . $fields . " from " . static::$table . " " . $filter);
        $ret_val = array();

        if(!$res) {
                    
            throw new Exception('Users not exists');
        }
              
		while($rw = mysqli_fetch_object($res, get_called_class())){

			$ret_val[] = $rw;
		}

        if(!$ret_val) {
                    
            throw new Exception('Users not found.');
        }
 
		return $ret_val;
	}

    /**
     *
     * @return int
     * @throws Exception
     */
	public function Insert()
	{
		$db = Database::GetConnection();
		$columns_string = implode(",",static::$columns);
		$fields_arr = array();
		foreach(static::$columns as $field){
			$fields_arr[$field] = $this->$field;
		}
		$field_values_string = "'" . implode("','",$fields_arr) . "'";
                
        $res = mysqli_query($db,"insert into " . static::$table . " ({$columns_string}) values ({$field_values_string})");

		if(!$res)
		{
            throw new Exception('Try again!');
        }

		$this->id = mysqli_insert_id($db);
                
        return $this->id;
	}

    /**
     *
     * @return object
     * @throws Exception
     */
	public function Update()
	{
		$db = Database::GetConnection();
		$fields_arr = array();
		foreach(static::$columns as $field){
			$fields_arr[] = $field . "='" . $this->$field . "'";
		}
		$fields_update_string = implode(",",$fields_arr);
		$id_column = static::$id_column;
                
        $res = mysqli_query($db,"update " . static::$table . " set {$fields_update_string} where " . $id_column . " = " . $this->$id_column);

		if(!$res)
		{
            throw new Exception('Item is not updated.');
        }
                
        return $res;
	}

    /**
     *
     * @param int $id
     * @return boolean
     * @throws Exception
     */
	public function Delete($id)
	{
		$db = Database::GetConnection(); 
                
        $res = mysqli_query($db,"delete from " . static::$table . " where " . static::$id_column . " = {$id}");
                
		if(!$res)
		{
            throw new Exception('Item is not deleted.');
        }
                
        return $res;
	}
}
