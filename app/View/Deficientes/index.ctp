<!-- File: /app/View/Defcientes/index.ctp -->
       
      <!-- Jumbotron -->
      
     
      <div class="jumbotron">
        <h1>CRD!</h1>
        <p class="lead">Ferramenta criada para gerenciar os deficientes da cidade.</p>
        
        <?php 
             
             echo $this->Form->create('Deficiente', array('action' => 'index', 'class' => 'form-search')); 
             echo '<div class="input-append">';
             echo $this->Form->input('', array('class' => 'span2 search-query', 'type' => 'text', 'div' => ''));
             echo '<button type="submit" class="btn"><i class="icon-search"></i></button>';
             echo $this->Form->end();
             echo '</div>'; 
            
             if(isset($retorno)){ ?>
                 <div class="span9">
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
                      <tbody>
                        <?php foreach($retorno as $deficiente): ?>       
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
                                   __('Tem Certeza que quer deleter # %s?', $deficiente['Deficiente']['nome'])); ?></td</br>
                           </tr> 

                               <?php   endforeach;  } ?>
                       </tbody>
                    </table>
                </div>
        </div>
      
      <hr>
      <div class="jumbotron">
      <a href="/deficiente/deficientes/add" class="btn btn-primary btn-large">Add Novo Deficiênte</a>
      </div>
      </hr>
      <!-- Example row of columns -->
      

     
   
