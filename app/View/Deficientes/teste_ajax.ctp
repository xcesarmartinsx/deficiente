<?php
echo $this->Form->create('NomeModel');
echo $this->Form->input('nome');
echo $this->Form->input('sobrenome');
echo $this->Js->submit('Enviar', array(
    'before' => $this->Js->get('#loading')->effect('fadeIn'),
    'success' => $this->Js->get('#loading')->effect('hide'),
    'update' => '#respostaAjax',
    'complete'=>''
        )
);
echo $this->Form->end(); ?>
<div id="loading">Loading...</div>
<div id="respostaAjax"></div>