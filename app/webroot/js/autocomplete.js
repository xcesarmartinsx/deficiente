$(document).ready(function (){
          $("#Deficiente").keyup(function(){
            
            $('#Deficiente').autocomplete({  
  
                source: "/deficiente/deficientes/busca/"+$(this).val(),
                minLength: 2,
                select:function(event,ui){}
            });
        });
//--------------------------------------------------------------------- 

        $(".ButtonSmall").click(function(){
          
          var buscar = $('#Deficiente').val();
           // alert(buscar);
           //$('.bloco').html();
           $.ajax({
               type : "POST",
               url: "/deficiente/deficientes/lista/" + buscar,        
               success: function(retorno) {
                  $("#bloco").html(retorno);
              }
           });      
      });  
});


