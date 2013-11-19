<!-- File: /app/View/Deficientes/listar.ctp -->
<?php 
     echo $this->html->script(array('autocomplete')); 
     echo $this->html->script(array('listagem'));
     echo $this->html->script(array('jqueryUI')); 
     echo $this->html->css(array('jqueryUI'));
?>
<style type="text/css">
    .acimaTabela { 

        width: 1010px;
        margin-left: auto;
        margin-right: auto;
        background-color: #0081c2;
        padding-bottom: 0px;
    }
    .busca {
        width: 330px;
        float: right;
        padding-top: 15px;
   
    }
    .titulo {
        float: left; 
        padding-left: 35px;
    }
    .link {
        cursor: pointer;
    }
    .prox {
        cursor: pointer;
    }
    .ant{
        cursor: pointer;
    }
</style>
        <div class="acimaTabela">
             <div class="titulo">
                <h3>Listagem de Deficientes</h3>
             </div>  

        <div class="busca form-search">
        <?php 

             echo '<div class="input-append">';
             echo $this->Form->input('', array('class' => 'span3 search-query', 'type' => 'text', 'placeholder'=>'Pesquisar','div' => '', 'id'=> 'Deficiente'));
             echo '<button type="submit" class="ButtonSmall"><i class="icon-search"></i></button>';
             echo '</div>';
        ?>
              </div>   
        </div> 
<div id="bloco">
<div class="container">
<div class="row">
<div class="span12">
   
 <table class="table table-bordered table-hover">
     
    <thead>
    <tr>
      <th><?php //echo $this->Paginator->sort('nome','Nome') ?>
          <a class="PGnome link">Nome</a>
      </th>
      <th><?php //echo $this->Paginator->sort('deficiencia','Deficiência') ?>
          <a class="PGdeficiencia link">Deficiência</a>
      </th>
      <th><?php //echo $this->Paginator->sort('cpf','CPF') ?>
          <a class="PGcpf link">CPF</a>
      </th>
      <th style="width: 20%;">Ações</th>
    </tr>
  </thead>
 
        <?php foreach ($deficientes as $deficiente): ?>
            <tr class="del tr<?php echo $deficiente['Deficiente']['id'];?>">
                <td><?php echo $deficiente['Deficiente']['nome']?></td>
                <td><?php echo $deficiente['Deficiente']['deficiencia']?></td>
                <td><?php echo $deficiente['Deficiente']['cpf']?></td>
                <td><?php echo $this->Form->postLink(__('<i class="icon-edit"></i>'), 
                    array('action' => 'edit', $deficiente['Deficiente']['id']),
                    array('class'=>'btn', 'escape' => false),
                    __('Tem Certeza que quer Editar # %s?', $deficiente['Deficiente']['nome'])); ?>
                
       
                <?php /*echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), 
                    array('action' => 'delete', $deficiente['Deficiente']['id']),
                    array('class'=>'btn btn-danger remover', 'escape' => false),
                    __('Tem Certeza que quer deleter # %s?', $deficiente['Deficiente']['nome']));*/ ?>
                <a href="#" class="btn btn-danger remover" onclick="if (confirm(&quot;Tem Certeza que quer deleter # <?php echo $deficiente['Deficiente']['nome'];?>?&quot;)) { deleta(id= '<?php echo $deficiente['Deficiente']['id'];?>'); } event.returnValue = false; return false;"><i class="icon-remove icon-white"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
  
 
 </table>
        </div>
    </div>
    <br/>
<?php //echo $this->Paginator->prev('Anterior').' '.$this->Paginator->numbers().' '.$this->Paginator->next('Próximo');
/*           
echo $this->Paginator->counter(
    'Page {:page} of {:pages}, showing {:current} records out of
     {:count} total, starting on record {:start}, ending on {:end}'
); */
 ?>
   <div class="paginacao"></div> 
   <div class="PGtotal invisible"><?php echo $this->Paginator->counter('{:pages}'); ?></div>
   <div class="PGatual invisible"><?php echo $this->Paginator->counter('{:page}'); ?></div
 
  </div>
  </div>
