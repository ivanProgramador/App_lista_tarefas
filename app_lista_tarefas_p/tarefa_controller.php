<?php
   //protegida

   require_once '../../app_lista_tarefas/tarefa.service.php';
   require_once '../../app_lista_tarefas/tarefa.model.php';
   require_once '../../app_lista_tarefas/conexao.php';
   
  
   // tratando a varivel ação 

   $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

   
     if( $acao == 'inserir'){
        
         $tarefa = new Tarefa();

         $tarefa->__set('tarefa',$_POST['tarefa']);

         $conexao = new Conexao();

         $tarefaService = new TarefaService($conexao, $tarefa);

         $tarefaService->inserir();

         header('Location: nova_tarefa.php?inclusao=1');

   }else if($acao == 'recuperar'){

         $tarefa  =  new Tarefa();
         $conexao =  new Conexao();
         $tarefaService = new TarefaService($conexao,$tarefa);
         $tarefas = $tarefaService->recuperar();

   }else if($acao == 'atualizar'){




         $tarefa  =  new Tarefa();
         $tarefa->__set('id', $_POST['id']); 
         $tarefa->__set('tarefa', $_POST['tarefa']);

         $conexao =  new Conexao();
         $tarefaService = new TarefaService($conexao,$tarefa);


         if($tarefaService->Atualizar()){

            if (isset($_GET['pag']) && $_GET['pag'] == 'index') {
               
               header('location: index.php');

           }else{
           
           header('location: todas_tarefas.php');
           
           }


          }    






   }elseif ($acao == 'remover'){
         
         $tarefa = new Tarefa();
         $tarefa ->__set('id',$_GET['id']);
         $conexao =  new Conexao();
         $tarefaService =  new TarefaService($conexao,$tarefa);
         $tarefaService->remover();
         header('location: todas_tarefas.php');

  }elseif($acao == 'marcarRealizada') {

         $tarefa = new Tarefa();
         $tarefa->__set('id',$_GET['id']);
         $tarefa->__set('id_status',2);

         $conexao = new Conexao();

         $tarefaService = new TarefaService($conexao, $tarefa);
         $tarefaService->marcarRealizada();

         header('location: todas_tarefas.php');
     
  } elseif ($acao == 'recuperarTarefasPendentes') {

         $tarefa  =  new Tarefa();
         $tarefa-> __set('id_status',1);

         $conexao =  new Conexao();
         $tarefaService = new TarefaService($conexao,$tarefa);
         $tarefas = $tarefaService->recuperarTarefasPendentes();
    



  }



   



?>