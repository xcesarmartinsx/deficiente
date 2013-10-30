(function(){
    jQuery.fn.ajaxDelete = function(options){
        this.each(function(){
            var settings = {
                url: "",
                type: "POST",
                dataType: "JSON"
            };
            
            if(options){
                $.extend(settings, options);
            }
            $this = jQuery(this);
            
            var url_base = document.location.pathname;
                        
            $this.bind('click', function(){
                $.ajax({
                    url: url_base + settings.url,
                    type: settings.type,
                    dataType: settings.dataType,
                    data: {"id": $(this).attr('id')},
                    success: function(data){
                        $.each(data, function(i, val){
                            
                            $('.teste').fadeOut("slow");
                            $('.teste').html(val.mensagem);
                            $('.teste').fadeIn("slow");

                        });
                    }
                });
                
                $(this).parents("tr").fadeOut("slow");
            });
        });
    }
})(jQuery)
