$(document).ready(function() {
    $('#voice').click(function () {
        if($(this).hasClass('voice')) {
            $(this).removeClass('voice')
                .addClass('unvoice');
            music.pause();
        }
        else {
            $(this).addClass('voice')
                .removeClass('unvoice');
            music.play();
        }
    });

    $('#registerForm').submit(function (e) {

    })
	
});