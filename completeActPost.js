
$(document).ready(function(){
    $('#search_text').keyup(function(){
        var query = $(this).val();
        if(query != '')
        {
            $.ajax({
                url:"search.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#postcodeList').fadeIn();
                    $('#postcodeList').html(data);
                }
            });
        }
    });
    $('#postcodeList').on('click', 'li', function(){
        $('#search_text').val($(this).text());
        $('#userinput_activity').val($(this).text());
        $('#postcodeList').fadeOut();
    });
});
