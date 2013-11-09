$(document).ready(function (){
          $("#Deficiente").keyup(function(){
            
            $('#Deficiente').autocomplete({  
  
                source: "/deficiente/deficientes/busca/"+$(this).val(),
                minLength: 2,
                select:function(event,ui){}
            });
        }) 
});


