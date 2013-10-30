<?php
class ProdutosController extends AppController{
    public $name = 'Produtos';
   //public $components = array('RequestHandler'); //Componente que verifica o tipo de requisição
    
    public function index(){
        $this->set('produtos', $this->Produto->find('all'));
    }
    
    public function delete(){
        if($this->RequestHandler->isAjax()){  //verifica se é ajax
            $id = $this->request->data['id']; //pega o id
            if($this->Produto->delete($id)){  //deleta
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
}
?>
