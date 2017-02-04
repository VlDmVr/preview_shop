$(document).ready(function()
{
    //отображает форму для отправки заказа в корзине пользователя
    $('#make_order').click(function()
    {
        $('#order_form').show();
    });

    //отображает список категорий существующих на данный момент в панели администратора(создать категорию)
    $('#see_category h3').one('click', function()
    {
        $.ajax({
            type: 'POST',
            url: '/ajax/category.php',
            dataType: 'json',
            success: function(data)
            {
                for(var i=0; i<data.length; i++)
                {
                    $('#isset_category ul').append('<li>'+data[i]+'</li>');
                }
                $('#see_category h3').css({ 
                                            'color':'#8E8E91', 
                                            'cursor':'default'
                                        });
            }

        });

    });
     
});
