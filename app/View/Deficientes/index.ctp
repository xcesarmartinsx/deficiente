<!-- File: /app/View/Defcientes/index.ctp -->
       
      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>CRD!</h1>
        <p class="lead">Ferramenta criada para gerenciar os deficientes da cidade.</p>
        
        <?php 
             $options = array(
                 'label' => 'Buscar',
                 'div' => array(
                     'class' => 'btn btn-default',
                 ));
             echo $this->Form->create('Deficiente', array('action' => 'index', 'class' => 'form-search')); 
             echo '<div class="input-append">';
             echo $this->Form->input('', array('class' => 'span2 search-query', 'escape' => 'false', 'type' => 'text'));
             echo $this->Form->end($options);
               //echo '<button type="submit" class="btn"><i class="icon-search"></i></button>';
             echo '</div>';
            
             if(isset($retorno)){ 
                 echo '<h3>Resultado:</h3>';
                foreach($retorno as $deficiente)        
                 echo '<tr>';
                    echo $deficiente['Deficiente']['nome'].'<br>';
                    echo $deficiente['Deficiente']['deficiencia'].'<br>'; 
                    echo $deficiente['Deficiente']['cpf'].'<br>';    
             }
         ?>
        
        <a href="/deficiente/deficientes/add" class="btn btn-primary btn-large">Add Novo Deficiênte</a>
        
      </div>

      <hr>
      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>

     
   
