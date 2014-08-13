<?php

namespace Entities;
/**
 * @Entity
 */
class Login {

	/**
	* @Id @Column(type="integer") @GeneratedValue
	*/
	private $id;
	
	
	
	public function setId($id){
		$this->id = $Id;
	}
	public function getId(){
		return $this->id;
	}
	
	/**
	  * @Column(type="string")
	  */
	private $username;
	
	
	
	/**
	  * @Column(type="string")
	  */
	private $password;

	
	
	
	public function getPassword() 
	{
	  return $this->password;
	}
	
	public function setPassword($value) 
	{
	  $this->password = md5($value . "KmR2@*)&+");
	}
	
	
	public function getUsername() 
	{
	  return $this->username;
	}
	
	public function setUsername($value) 
	{
	  $this->username = $value;
	}
	
	
	
	
}