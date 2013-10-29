<h1>Editar Portador de Deficiência</h1>

<?php

$options = array('label' => 'Adicionar Deficiente',
                'div' => array('class' => 'btn btn-primary btn-large'));

echo $this->Form->create('Deficiente');
echo $this->Form->input('nome');
echo $this->Form->input('rg');
echo $this->Form->input('cpf');
echo $this->Form->input('mae');
echo $this->Form->input('endereco');
echo $this->Form->input('bairro');
echo $this->Form->input('deficiencia', array(
                        'options' =>    array('Visual', 'Motora', 'Auditiva', 'Mental', 'Múltipla'),
                        'empty' => '(escolha uma opção)'));
echo $this->Form->input('escolaridade', array(
                        'options' =>    array('analfabeto', 'fundamental incompleto', 'fundamental completo', 'ensino medio'),
                        'empty' => '(escolha uma opção)'));
echo $this->Form->input('renda', array(
                        'options' =>    array('até 02 salários mínimos', 'de 02 a 03 salários', 'acima de 03 salários'),
                        'empty' => '(escolha uma opção)'));
echo $this->Form->input('ocupacao', array(
                        'options' =>    array('empregado', 'desempregado', 'ocupação informal', 'nenhuma ocupação'),
                        'empty' => '(escolha uma opção)'));
echo $this->Form->input('familia', array(
                        'options' =>    array('de 01 a 04 pessoas', 'de 05 a 06 pessoas', 'mais de 06 pessoas'),
                        'empty' => '(escolha uma opção)'));
echo $this->Form->end($options);
?> 


