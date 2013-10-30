<style type="text/css">
    .teste {display: none;}
</style>
<?php
// echo $this->Html->script('jquery');
      echo $this->Html->script('jquery.ajaxDelete');
 ?>
<script type="text/javascript">
    $(function(){
        $('.deletar_produto').ajaxDelete({url: '/delete'});
    })
</script>  
<div class="container">
<div class="row">
<div class="span12">
	<h3>Listagem de Deficientes</h3>
 <table class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>ID</th>
      <th>Descrição</th>
      <th>Quantidade</th>
      <th style="width: 20%;">Ações</th>
    </tr>
  </thead>
  
    
    
 
   <?php foreach($produtos as $produto): ?>
     <tr>
         <td><?php echo $produto['Produto']['id']; ?></td>
         <td><?php echo $produto['Produto']['descricao']; ?></td>
         <td><?php echo $produto['Produto']['quantidade']; ?></td>
         <td><?php echo $this->Html->link('deletar', "#", array(
               'class' => 'deletar_produto',
               'id' => $produto['Produto']['id']
                )); ?></td>
         
</tr>
        <?php endforeach; ?>
    
</table>
        <div class="teste alert alert-success"></div> <!-- DIV QUE RECEBE A MENSAGEM POR AJAX -->