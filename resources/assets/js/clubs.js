Placeholdem( document.querySelectorAll( '[placeholder]' ) );

var fadeElems = document.body.querySelectorAll( '.fade' ),
    fadeElemsLength = fadeElems.length,
    i = 0,
    interval = 150;

function incFade() {
    if( i < fadeElemsLength ) {
        fadeElems[ i ].className += ' fade-load';
        i++;
        setTimeout( incFade, interval );
    }
}

setTimeout( incFade, interval );

$(document).ready(function() {
    $('.search_icon').click(function () {
        $('.search_block').css('display','block');
        $('.search_block input').focus();
    });

    $('.search_block input').blur(function () {
        $('.search_block').css('display','none');
    });

    $('.close_image_modal').click(function(e) {
        e.preventDefault();
        $('#myModal1').modal('hide');
    });

});


$(document).on('click', '.database_nav li', function () {
    var self = $(this);
    self.closest('.database_nav').find('li').removeClass('active');
    self.addClass('active');
});


















