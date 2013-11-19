<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeficientesController
 *
 * @author CESAR
 */
//comit 2
class DeficientesController extends AppController{
    //put your code here
    public $name = 'Deficientes';
    public $helpers = array ('Js' => array('jquery'),'html','form');
    public $components = array('Session');
   //public $helpers = array('Js');
    
     public function index($deficiente = null){
        
         if($this->data){
            $retorno = $this->Deficiente->find('all', 
                           array('fields' => array('Deficiente.id', 'Deficiente.nome', 'Deficiente.cpf', 'Deficiente.deficiencia'), 
                                 'conditions' => array('Deficiente.nome LIKE'=> '%'.$this->data['Deficiente'].'%')));
            $this->set(compact('retorno'));
        } 
     }
    
    public function listar($deficiente = null){
        $this->paginate = array('limit' => 10);
        $deficientes = $this->Deficiente->find('all');
        $deficientes = $this->paginate('Deficiente');
        $this->set(compact('deficientes'));
        
        //se eh Ajax
        if($this->RequestHandler->isAjax()){  //verifica se é ajax
                $buscar = $this->request->data['buscar'];
                //realiza a busca

                   $deficientes = $this->paginate('Deficiente', array('Deficiente.nome LIKE'=> '%'.$buscar.'%'));
                   $this->set(compact('deficientes'));

                    $array_json = array();
                    foreach($deficientes as $result){
                        $array['nome'] = $result['Deficiente']['nome'];
                        $array['id'] = $result['Deficiente']['id'];
                        $array['cpf'] = $result['Deficiente']['cpf'];
                        $array['deficiencia'] = $result['Deficiente']['deficiencia'];

                    array_push($array_json, $array);   
                    }
                    echo json_encode($array_json);
                exit();
        }
    }

    public function paginacao($busc = null){
         
        if($busc){
            $this->layout = null;
            $this->paginate = array('limit' => 10);
             $deficientes = $this->paginate('Deficiente', array('Deficiente.nome LIKE'=> '%'.$busc.'%'));
             $this->set(compact('deficientes'));
                
       }  else {
            $this->layout = null;
            $this->paginate = array('limit' => 10);
            $deficientes = $this->Deficiente->find('all');
            $deficientes = $this->paginate('Deficiente');
            $this->set(compact('deficientes'));           
       }

    } 
    
     public function add(){
         if($this->request->is('post')){
            if($this->Deficiente->save($this->request->data)){
                $this->Session->setFlash("O Novo Deficiente Foi Inserido.");
                $this->redirect(array('action' => 'index'));
            }
        }
     }
     
     //não está sendo usado
     public function delete($id = NULL){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException;
        } 
        if($this->Deficiente->delete($id)){
            $this->Session->setFlash('O Post com título: ' . $id. ' foi deletado');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function deleteAjax(){
        if($this->RequestHandler->isAjax()){  //verifica se é ajax
            $id = $this->request->data['id']; //pega o id
            if($this->Deficiente->delete($id)){  //deleta
                echo json_encode(array(  //retorna em json
                    'retorno' => array( 
                        'mensagem' => __('Produto deletado com sucesso! via ajax') 
                    )
                ));
                exit();
            }else{
                 echo json_encode(array(
                    'retorno' => array(
                        'mensagem' => __('O produto não foi deletado!')
                    )
                ));
                exit();
            }
        }
    }
    
     public function edit($id = null){
        if($this->request->data){
            if($this->Deficiente->save($this->request->data))
                $this->Session->setFlash('Post editado com sucesso!');
            $this->redirect(array('action' => 'listar'));
        }else{
            $this->data = $this->Deficiente->read(null, $id);
        }
    } 
    
    public function busca($Deficiente = null){
          $this->layout = null;
          if($Deficiente){
             
           $resultado = $this->Deficiente->find('all', 
                                                array('fields' => 
                                                      array('Deficiente.id', 'Deficiente.nome'), 
                                                            'conditions' => array('Deficiente.nome LIKE'=> '%'.$Deficiente.'%')));
 
            $array_json = array();
            foreach($resultado as $result){
                $array['label'] = $result['Deficiente']['nome'];
                $array['id'] = $result['Deficiente']['id'];
            array_push($array_json, $array);   
            }
            echo json_encode($array_json);
          }
    }
    
    public function testeAjax() {
        if ($this->RequestHandler->isAjax()) {
            $this->layout = 'ajax';
            // Ações do Controler
            // Exemplo
            $this->set('dados',$this->request->data);
            sleep(5); // para ver o efeito de fade
            $this->render('ajax_conteudo');
        } else {
            //Ações caso o Js não esteje habilitado
        }
    }
}
?>
