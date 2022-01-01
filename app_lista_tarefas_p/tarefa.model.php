<?php

  class Tarefa{

  	private $id;
  	private $id_status;
  	private $tarefa;
  	private $data_cadastro;

   // esses metodos se moldam conforme o atributo recebido tornando desnecessario cria um get /set pra cada atributo
  	
  	public function __get($atributo){

  		return $this -> $atributo;

  	}


  	public function __set($atributo,$valor){

  		return $this -> $atributo = $valor;

  	}



  }



?>