<!-- File: /app/View/Deficientes/listar.ctp -->
<div class="container">
<div class="row">
<div class="span12">
	<h3>Listagem de Deficientes</h3>
 <table class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Nome</th>
      <th>Deficiência</th>
      <th>CPF</th>
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