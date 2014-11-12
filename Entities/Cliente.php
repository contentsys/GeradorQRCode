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
	 * @Column(type="string", nullable=true)
	 */
	private $email;
	 
	
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($value)
	{
		$this->email = $value;
	}
	
	
	/**
	 * @Column(type="string", nullable=true)
	 */
	private $telefone;
	 
	
	
	public function getTelefone()
	{
		return $this->telefone;
	}
	
	public function setTelefone($value)
	{
		$this->telefone = $value;
	}
	
	
	/**
	 * @Column(type="string", nullable=true)
	 */
	private $codigo;
	
	
	
	public function getCodigo()
	{
		return $this->codigo;
	}
	
	public function setCodigo($value)
	{
		$this->codigo = $value;
	}
	
	

	
}