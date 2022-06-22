$(document).ready (()=> {  
    $('#data').after ('<div id="nav"></div>');  
    var rowsShown = 4;  
    var rowsTotal = $('#data tbody tr').length;  
    var numPages = rowsTotal/rowsShown;  
    for (i = 0;i < numPages;i++) {  
        var pageNum = i + 1;  
        $('#nav').append ('<a href="#" rel="'+i+'">'+pageNum+'</a> ');  
    }  
    $('#data tbody tr').hide();  
    $('#data tbody tr').slice (0, rowsShown).show();  
    $('#nav a:first').addClass('active');  
    $('#nav a').bind('click', function() {  
    $('#nav a').removeClass('active');  
   $(this).addClass('active');  
        var currPage = $(this).attr('rel');  
        var startItem = currPage * rowsShown;  
        var endItem = startItem + rowsShown;  
        $('#data tbody tr').css('opacity','0.0').hide().slice(startItem, endItem).  
        css('display','table-row').animate({opacity:1}, 300);  
    });
    
    $('.bx-menu').click(()=>{
        $('.navbar').toggleClass('show');
    });

    $('.startsell').click(()=>{
        $('.sellform').show();
        let productel = $('.startsell');
        let proname = productel.attr('name');
        let price = productel.attr('price');
        let p_code = productel.attr('p_code');
        $('.asell').text("You are about to sell " + proname+" ,"+price+" frw each.");
        $('.sell').attr('href','/inventory/sellproduct?d='+price+'&p='+p_code);
    });

    $('#close').click(()=>{
        $('.sellform').hide();
    });
});

