$(document).ready(function()
{
    var current_key = 0,
    img_path = './application/views/widgets/images/slider/',
    img_arr;
    
    $('#left_arrow').css({
            'top': ($('#widget_slider').height()/2)-($('#left_arrow').height()/2),
    });;
    
    $('#right_arrow').css({
            top: ($('#widget_slider').height()/2)-($('#right_arrow').height()/2),
            left: $('#widget_slider').width()-$('#right_arrow').width(),
    });
    
    $.ajax({
        
        type: "POST",
        url: "/application/views/widgets/sliderHandler.php",
        dataType: "json",
        success: function(data){
            
            $("div #widget_slider").css({
                                            'display' : 'block',
                                        });
            if(data.length != 0){
                
                $('#preview').attr('src', img_path + data[current_key]);
						
		img_arr = data;
                
                $('.arrows').hide();
            }

        }
    });
    
    //правая стрелка - click
    $('#right_arrow').on('click', function(){
			
        current_key++;

        if(current_key > 0){
            $('#left_arrow').show().css({
                                    top: ($('#widget_slider').height()/2)-($('#right_arrow').height()/2),
            });
        }
        else{
            $('#left_arrow').hide();
        }

        if(current_key >= img_arr.length - 1){
            current_key = img_arr.length - 1;
            $('#right_arrow').hide();
        }

        $('#preview').attr('src', img_path + img_arr[current_key]);
    });
     
    //левая стрелка - click
    $('#left_arrow').on('click', function(){
				
        current_key--;

        if(current_key < img_arr.length - 1){

                $('#right_arrow').show();
        }

        if( current_key <= 0 ){
                current_key = 0;
                $('#left_arrow').hide();
        }

        $('#preview').attr('src', img_path + img_arr[current_key]);
    });
    
    //правая кнопка - наведение мышью
    $('#right_arrow').on('mouseenter', function(){
        
       $(this).css('opacity', '1'); 
    });
    
    $('#right_arrow').on('mouseleave', function(){
        
       $(this).css('opacity', '0.7'); 
    });
    
    //левая кнопка - наведение мышью
    $('#left_arrow').on('mouseenter', function(){
        
       $(this).css('opacity', '1'); 
    });
    
    $('#left_arrow').on('mouseleave', function(){
        
       $(this).css('opacity', '0.7'); 
    });
    
    //скрытие и показ стрелок навигации
    $('#widget_slider').on('mouseenter', function(){
        
        if(current_key == 0){
            
            $('#right_arrow').show();
            $('#left_arrow').hide();
        }
        else if(current_key == img_arr.length - 1){
            
            $('#right_arrow').hide();
            $('#left_arrow').show();
        }
        else{
            $('.arrows').show();
        }
        
    });
    
    $('#widget_slider').on('mouseleave', function(){
        
        $('.arrows').hide();
    });
    //end скрытие и показ стрелок навигации
});



