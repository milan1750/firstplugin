jQuery( document ).ready(function() {
    var title = jQuery('div.fp_max_adds').attr('title');
    var image = jQuery('div.fp_max_adds').attr('image');
    if(image) {
        jQuery('div#page').css('display', 'none');
        var html = '';
        
        html = ' <div class="adds-container"> <img src="'+ image  +'" alt="Avatar" class="image"><div class="overlay">' + title + '<br/><br/><button class="btn btn-primary" id="close-add">Close</button></div></div>';
        
        
        jQuery('body').append(html);
    }

    jQuery('button#close-add').click(function() {
        jQuery('div.adds-container').css('display', 'none');
        jQuery('div#page').css('display', 'block');
    });
});