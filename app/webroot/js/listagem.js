$(document).ready(function (){
  var nome = 0;
  var deficiencia = 0;
  var cpf = 0;
  var anterior;
  anterior = 1;
  
  //PAGINAÇÃO
  var PGtotal = $('.PGtotal').html();
  var PGatual = $('.PGatual').html();
  paginacao(PGtotal, PGatual);
 
    
  //FAZ A REQUISIÇÃO DA PÁGINA
  $(".link").on('click',function(){
              
      var pagina;
      pagina = $(this).find('.paginas').html();
      var pagin = $(this).find('.paginas');
      var existe = pagin.hasClass('paginas');
      if(existe) {
        $.ajax({
            type : "POST",
            url: "/deficiente/deficientes/paginacao/page:"+pagina,
            dataType: "JSON",
            success: function(data) {  
              populaTabela(data);
           }
        }); 
        
         if(pagina == 1) $(this).html(' '+ pagina+ ' ');
         else $(this).html('| '+pagina+ ' ');
         var retorno;
         if(anterior == 1) retorno = '<a class=\'paginas\'>' + anterior + '</a> ';
         else retorno = '| <a class=\'paginas\'>'+ anterior + '</a> ';
         $('.pg'+ anterior).html(retorno);
         anterior = pagina;
         
         //verifica se inutiliza 'proxima'
         if(pagina == PGtotal){
             $('.prox').html(' Próxima');
         }else{
             $('.prox').html(' <a class=\'proxima\'>Próxima</a> ');
         }
         
         //verifica se inutiliza 'anterior'
         if(pagina == 1){
             $('.ant').html('Anterior ');
         }else{
             $('.ant').html('<a class=\'anterior\'>Anterior</a> ');
         }
      }
  }); 
  
  //PRÓXIMA E ANTERIOR
  $(".prox").on('click',function(){ 
     
   //verifica se pode ser clicado
      var prox = $(this).find('.proxima');
      var pode = prox.hasClass('proxima');
      if(pode){ //se pode entra nesse if
          var pagina = parseInt(anterior) + 1;
          //alert(pagina);
          $.ajax({
                type : "POST",
                url: "/deficiente/deficientes/paginacao/page:"+pagina,
                dataType: "JSON",
                success: function(data) {  
                  populaTabela(data);
                 }
          }); 
          //inutiliza próxima página
          $('.pg'+ pagina).html('| '+ pagina + ' ');
          //libera a anterior
          var mensagem;
          if(anterior == 1) mensagem = '<a class=\'paginas\' id=\''+ anterior +'\'>'+ anterior + ' </a>';
          else mensagem = '| <a class=\'paginas\'>'+ anterior + '</a> ';
         
          $('.pg'+ anterior).html(mensagem);

          //verifica se inutiliza 'proxima'
          if(pagina == PGtotal){
              $(this).html('Próxima');
          }
          
          //torna utilizávem anterior
          $('.ant').html('<a class=\'anterior\'>Anterior</a> ');
          
          anterior = pagina;
      }
  });
    
 $(".ant").on('click',function(){
   //verifica se pode ser clicado
      var prox = $(this).find('.anterior');
      var pode = prox.hasClass('anterior');
      if(pode){ //se pode entra nesse if
          var pagina = anterior - 1;
            $.ajax({
                type : "POST",
                url: "/deficiente/deficientes/paginacao/page:"+pagina,
                dataType: "JSON",
                success: function(data) {  
                  populaTabela(data);
                 }
           }); 
        //inutiliza próxima página   
        var mensagem
        if(pagina == 1) mensagem = pagina+ ' ';
        else mensagem = '| '+ pagina + ' ';
        $('.pg'+ pagina).html(mensagem);
        
        //libera a anterior
        var mensagem;
          if(anterior == 1) mensagem = '<a class=\'paginas\' id=\''+ anterior +'\'>'+ anterior + ' </a>';
          else mensagem = '| <a class=\'paginas\'>'+ anterior + '</a> ';
         $('.pg'+ anterior).html(mensagem);
         
         //verifica se inutiliza 'anterior'
         if(pagina == 1){
             $(this).html('Anterior ');
         }
  
         //libera próxima
         $('.prox').html(' <a class=\'proxima\'>Próxima</a> ');
        anterior = pagina;
      }
 });   
    
  //REALIZA A BUSCA
       $(".ButtonSmall").click(function(){
            var buscar = $('#Deficiente').val();
            $.ajax({
               type : "POST",
               url: "/deficiente/deficientes/paginacao/"+buscar,
               dataType: "JSON",
              // data: {"buscar": buscar},
               success: function(data) {  
                 populaTabela(data);
              }
           });   
       }); 
       //ORDENA POR NOME
       $(".PGnome").click(function(){

           if(nome === 0){
               ordena('nome', 'desc');
               nome = 1;
           }else{
               ordena('nome', 'asc');
               nome = 0;
           }        
       }); 
       //ORDENA POR DEFICIENCIA
       $(".PGdeficiencia").click(function(){

           if(deficiencia === 0){
               ordena('deficiencia', 'desc');
               deficiencia = 1;
           }else{
               ordena('deficiencia', 'asc');
               deficiencia = 0;
           }        
       }); 
       //ORDE POR CPF
       $(".PGcpf").click(function(){

           if(cpf === 0){
               ordena('cpf', 'desc');
               cpf = 1;
           }else{
               ordena('cpf', 'asc');
               cpf = 0;
           }        
       });
       
});

function populaTabela(data){
               var retorno = '';
                 $.each(data, function(i,vale){
                    // $.each(vale.defi, function(j,val){
                      retorno = retorno +
                              "<tr class='del tr"+ vale.id + "'><td>" + vale.nome + "</td>" +
                              "<td>" + vale.deficiencia + "</td>" +
                              "<td>" + vale.cpf + "</td>" +
                              "<td> \n\
                         <a href=\"/deficiente/deficientes/edit/"+ vale.id +"\" class=\"btn\" onclick=\"if (confirm(&quot;Tem Certeza que quer Editar # "+  vale.nome +"?&quot;)) { submit(); } event.returnValue = false; return false;\"><i class=\"icon-edit\"></i></a>\n\
                          \n\<a href=\"#\" class=\"btn btn-danger remover\" onclick=\"if (confirm(&quot;Tem Certeza que quer deleter # "+  vale.nome +"?&quot;)) { deleta(id= '"+vale.id+"'); } event.returnValue = false; return false;\"><i class=\"icon-remove icon-white\"></i></a></td>\n\
                               </td></tr>";

                    // });
                 });
                 $('.del').html('');
                 $(".table").append(retorno);
    
}

function ordena(sort, direction){
           $.ajax({ 
               type : "POST",
               url: "/deficiente/deficientes/paginacao/sort:" + sort +"/direction:"+direction,
               dataType: "JSON",
               success: function(data) {  
                 populaTabela(data);
              }
           }); 
}

function deleta(id){
 
    $.ajax({
               type : "POST",
               url: "/deficiente/deficientes/deleteAjax",
               dataType: "JSON",
               data: {"id": id},
               success: function(data) {
                   //faz a linha do deficiente excluido desaperecer
                    $(".tr"+id).fadeOut("slow");
              }
    }); 
}

function paginacao(PGtotal, PGatual){
    
  var cont = 1;
  var paginacao ='<span class=\'ant \'>Anterior </span>';
  var barra, string;
  while(cont <= PGtotal){
      if(cont > 1)
          barra = '| ';
      else
          barra = '';
      
      if(cont !== parseInt(PGatual))
          string = '<span class=\'link pg' + cont + '\'>'+ barra + ' <a class=\'paginas\' id=\''+ cont +'\'>' + cont + ' </a></span>';
      else
          string = '<span class=\'link pg' + cont + '\'>'+ barra +  cont + ' </span>';
      
      paginacao = paginacao + string;
      cont++;
  }    
      if(PGtotal > 1)
      paginacao = paginacao + '<span class=\'prox\'><a class=\'proxima\'>Próxima</a></span>';
      else
      paginacao = paginacao + '<span class=\'\'>Próxima</span>';    
      $('.paginacao').html(paginacao);
        
}
 


