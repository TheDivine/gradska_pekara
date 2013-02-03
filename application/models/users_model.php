<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends MY_Model {

	private static $algo = '$2a';

	private static $cost = '$10';

	public $protected_attributes = array('id','hashed_password');

	public $before_create = array('hash_password');

	public $before_update = array('hash_password');

	public function check_login($username, $password)
	{	
		$user = $this->db->select('id,hashed_password,admin')
	                ->where('username',$username)
	                ->limit(1)
	                ->get($this->_table)->row();

	    if($user)
	    {
	    	if(self::check_password($user->hashed_password,$password))
	    		return $user;
	    }
	    	               
        return false;
	}

	public static function unique_salt() 
	{
		return substr(sha1(mt_rand()),0,22);
	}

	public static function hash($password) 
	{
		return crypt($password,self::$algo .self::$cost .'$'.self::unique_salt());
	}

	protected function hash_password($user)
    {
    	if(strlen($user['password']))
	        $user['hashed_password'] = self::hash($user['password']);

    	unset($user['password']);
    	return $user;
    }

	public static function check_password($hash, $password) 
	{
		$full_salt = substr($hash, 0, 29);
		$new_hash = crypt($password, $full_salt);
		return ($hash == $new_hash);
	}
}