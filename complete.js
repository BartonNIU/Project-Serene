
$(document).ready(function(){
    $('#postcode').keyup(function(){
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
    $(document).on('click', 'li', function(){
        $('#postcode').val($(this).text());
        $('#postcodeList').fadeOut();
    });
});
