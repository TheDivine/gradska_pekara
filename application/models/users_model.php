<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends MY_Model {

	private static $algo = '$2a';

	private static $cost = '$10';

	public function check_login($username, $password)
	{	
		$result = $this->db->select('id,hashed_password')
	                ->where('username',$username)
	                ->limit(1)
	                ->get($this->_table)->row();

	    if($result)
	    	return self::check_password($result->hashed_password,$password);
	    	               
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

	public static function check_password($hash, $password) 
	{
		$full_salt = substr($hash, 0, 29);
		$new_hash = crypt($password, $full_salt);
		return ($hash == $new_hash);
	}
}