var has_dark = localStorage.getItem('dark-mode'),
srcLogo  = $('.logo_transmita').attr('src'),
srcDLogo  = $('.logo_transmita').attr('data-dark-src'),
materias = [],
newSrc;
localStorage.setItem('logo_transmita', srcLogo);

// dark mode
if (has_dark == 'on') {
    $("#night-mode").prop('checked', true);
    $('body').addClass('dark-mode');
    newSrc = srcDLogo;
    $('.logo_transmita').attr('src', newSrc );
}

$('.wrapper .creative-agency-wrapper').click(function(){
    $(this).toggleClass('active');
});
$("#night-mode").click(function() {
    if($(this).is(':checked')){
        $('body').addClass('dark-mode');
        localStorage.setItem('dark-mode', 'on');
        $('.logo_transmita').attr('src', srcDLogo );
    }   
    else{
        localStorage.setItem('dark-mode', 'off');
        $('body').removeClass('dark-mode');
        $('.logo_transmita').attr('src', srcLogo);
    }
});