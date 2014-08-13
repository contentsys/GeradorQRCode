<?php
namespace Entities;

/**
 * @Entity
 */
use Doctrine\Common\Collections;

class Cliente {
	
	
	/**
	* @Id @Column(type="integer") @GeneratedValue
	*/
	private $id;
	
	public function getId() 
	{
	  return $this->id;
	}
	
	public function setId($value) 
	{
	  $this->id = $value;
	}
	
	/**
	  * @Column(type="string")
	  */
	private $nome;
	    
	
	
	public function getNome() 
	{
	  return $this->nome;
	}
	
	public function setNome($value) 
	{
	  $this->nome = $value;
	}
	
	
	/**
	 * @Column(type="string")
	 */
	private $email;
	 
	
	
	public function getNome()
	{
		return $this->nome;
	}
	
	public function setNome($value)
	{
		$this->nome = $value;
	}
	
	

	
}