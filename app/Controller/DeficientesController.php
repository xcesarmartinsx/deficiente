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
class DeficientesController extends AppController{
    //put your code here
    public $name = 'Deficientes';
    public $helpers = array ('html','form');
    public $components = array('Session');
    
     public function index($deficiente = null){
        if($this->data){
            $nomeBusca = $deficiente['Deficiente'];
            $retorno = $this->Deficiente->find('all', 
                           array('fields' => array('Deficiente.id', 'Deficiente.nome', 'Deficiente.cpf', 'Deficiente.deficiencia'), 
                                 'conditions' => array('Deficiente.nome LIKE'=> '%'.$this->data['Deficiente'].'%')));
            $this->set(compact('retorno'));
        } 
     }
    
    public function listar(){
       
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
}
?>
