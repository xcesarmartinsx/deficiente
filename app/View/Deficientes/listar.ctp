<!-- File: /app/View/Deficientes/listar.ctp -->
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
</style>
        <div class="acimaTabela">
             <div class="titulo">
                <h3>Listagem de Deficientes</h3>
             </div>  

        <div class="busca">
        <?php 
             echo $this->Form->create('Deficiente', array('action' => 'listar', 'class' => 'form-search')); 
             echo '<div class="input-append">';
             echo $this->Form->input('', array('class' => 'span3 search-query', 'type' => 'text', 'placeholder'=>'Pesquisar','div' => ''));
             echo '<button type="submit" class="ButtonSmall"><i class="icon-search"></i></button>';
             echo $this->Form->end();
             echo '</div>';
        ?>
              </div>   
        </div>          
<div class="container">
<div class="row">
<div class="span12">
   
 <table class="table table-bordered table-hover">
     
    <thead>
    <tr>
      <th><?php echo $this->Paginator->sort('nome','Nome') ?></th>
      <th><?php echo $this->Paginator->sort('deficiencia','Deficiência') ?></th>
      <th><?php echo $this->Paginator->sort('cpf','CPF') ?></th>
      <th style="width: 20%;">Ações</th>
    </tr>
  </thead>
 
        <?php foreach ($deficientes as $deficiente): ?>
            <tr>
                <td><?php echo $deficiente['Deficiente']['nome']?></td>
                <td><?php echo $deficiente['Deficiente']['deficiencia']?></td>
                <td><?php echo $deficiente['Deficiente']['cpf']?></td>
                <td><?php echo $this->Form->postLink(__('<i class="icon-edit"></i>'), 
                    array('action' => 'edit', $deficiente['Deficiente']['id']),
                    array('class'=>'btn', 'escape' => false),
                    __('Tem Certeza que quer Editar # %s?', $deficiente['Deficiente']['nome'])); ?>
                
       
                <?php echo $this->Form->postLink(__('<i class="icon-remove icon-white"></i>'), 
                    array('action' => 'delete', $deficiente['Deficiente']['id']),
                    array('class'=>'btn btn-danger remover', 'escape' => false),
                    __('Tem Certeza que quer deleter # %s?', $deficiente['Deficiente']['nome'])); ?></td>
            </tr>
        <?php endforeach; ?>
 
 </table>
        </div>
    </div>
  </div>