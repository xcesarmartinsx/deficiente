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
       if($this->data){
        $this->set('deficientes',
                $this->Deficiente->find('all', 
                           array('fields' => 
                               array('Deficiente.id', 'Deficiente.nome', 'Deficiente.cpf', 'Deficiente.deficiencia'), 
                                 'conditions' => array('Deficiente.nome LIKE'=> '%'.$this->data['Deficiente'].'%'))));   
       }
       else
        $this->set('deficientes', $this->Deficiente->find('all'));
    }
    
     public function add(){
         if($this->request->is('post')){
            if($this->Deficiente->save($this->request->data)){
                $this->Session->setFlash("O Novo Deficiente Foi Inserido.");
                $this->redirect(array('action' => 'index'));
            }
        }
     }
     
     public function delete($id = NULL){
        if(!$this->request->is('post')){
            throw  new MethodNotAllowedException;
        } 
        if($this->Deficiente->delete($id)){
            $this->Session->setFlash('O Post com título: ' . $id. ' foi deletado');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function edit($id = NULL){
        $this->Deficiente->id = $id;
        if($this->request->is('post')){
            $this->request->data = $this->Deficiente->read();
        }else{
            if($this->Deficiente->save = $this->request->data){
                $this->Session->setFlash("seu post foi editado com sucesso!");
                $this->redirect(array( 'action' => 'index'));
            }
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
            }
            array_push($array_json, $array);   
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
