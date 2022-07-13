$(document).ready(function() {
    if(document.getElementById('voice') !== null) {
        $('#voice').click(function () {
            if ($(this).hasClass('voice')) {
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
    }

    if(document.getElementById('registerForm') !== null) {
        $('#registerForm').submit(function (e) {

            if ($('#password').val().length < 6) {

                passwordBlock = document.getElementById('password-block');
                passwordBlock.className += " has-error";
                errorBlock = document.createElement('span');
                errorBlock.className = "help-block";
                errorTextBlock = document.createElement('strong');
                errorText = document.createTextNode('The password must be at least 6 characters.');
                errorTextBlock.appendChild(errorText);
                errorBlock.appendChild(errorTextBlock);
                passwordBlock.appendChild(errorBlock);
                $('html, body').animate({
                    scrollTop: $("#password-block").offset().top
                }, 500);
                setTimeout(function () {
                    passwordBlock.removeChild(errorBlock);
                }, 2000);
                e.preventDefault();
            } else if ($('#password').val() != $('#password-confirm').val()) {
                passwordBlock = document.getElementById('password-block');
                passwordBlock.className += " has-error";
                errorBlock = document.createElement('span');
                errorBlock.className = "help-block";
                errorTextBlock = document.createElement('strong');
                errorText = document.createTextNode('The password confirmation does not match.');
                errorTextBlock.appendChild(errorText);
                errorBlock.appendChild(errorTextBlock);
                passwordBlock.appendChild(errorBlock);
                $('html, body').animate({
                    scrollTop: $("#password-block").offset().top
                }, 500);
                setTimeout(function () {
                    passwordBlock.removeChild(errorBlock);
                }, 2000);
                e.preventDefault();
            }

        });
    }

    if(document.getElementById('characters') !== null) {
        function showCharacterBlock(sex) {
            var charactersBlock = document.getElementById('characters');

            if (sex == "male") {
                var oldBlock = document.getElementById('female-character');
                if (oldBlock !== null)
                    oldBlock.parentNode.removeChild(oldBlock);

                var male = document.createElement('div'),
                    m1Input = document.createElement('input'),
                    m1Label = document.createElement('label'),
                    m1Image = document.createElement('img'),
                    m2Input = document.createElement('input'),
                    m2Label = document.createElement('label'),
                    m2Image = document.createElement('img'),
                    m3Input = document.createElement('input'),
                    m3Label = document.createElement('label'),
                    m3Image = document.createElement('img'),
                    m4Input = document.createElement('input'),
                    m4Label = document.createElement('label'),
                    m4Image = document.createElement('img'),
                    m5Input = document.createElement('input'),
                    m5Label = document.createElement('label'),
                    m5Image = document.createElement('img');

                m1Image.setAttribute('src', '/img/character_m1.png');
                m1Label.setAttribute('for', 'm1');
                m1Label.appendChild(m1Image);
                m1Input.setAttribute('type', 'radio');
                m1Input.setAttribute('checked', 'checked');
                m1Input.setAttribute('name', 'character');
                m1Input.setAttribute('value', 'character_m1');
                m1Input.setAttribute('id', 'm1');
                m1Input.className = 'character';

                m2Image.setAttribute('src', '/img/character_m2.png');
                m2Label.setAttribute('for', 'm2');
                m2Label.appendChild(m2Image);
                m2Input.setAttribute('type', 'radio');
                m2Input.setAttribute('checked', 'checked');
                m2Input.setAttribute('name', 'character');
                m2Input.setAttribute('value', 'character_m2');
                m2Input.setAttribute('id', 'm2');
                m2Input.className = 'character';

                m3Image.setAttribute('src', '/img/character_m3.png');
                m3Label.setAttribute('for', 'm3');
                m3Label.appendChild(m3Image);
                m3Input.setAttribute('type', 'radio');
                m3Input.setAttribute('checked', 'checked');
                m3Input.setAttribute('name', 'character');
                m3Input.setAttribute('value', 'character_m3');
                m3Input.setAttribute('id', 'm3');
                m3Input.className = 'character';

                m4Image.setAttribute('src', '/img/character_m4.png');
                m4Label.setAttribute('for', 'm4');
                m4Label.appendChild(m4Image);
                m4Input.setAttribute('type', 'radio');
                m4Input.setAttribute('checked', 'checked');
                m4Input.setAttribute('name', 'character');
                m4Input.setAttribute('value', 'character_m4');
                m4Input.setAttribute('id', 'm4');
                m4Input.className = 'character';

                m5Image.setAttribute('src', '/img/character_m5.png');
                m5Label.setAttribute('for', 'm5');
                m5Label.appendChild(m5Image);
                m5Input.setAttribute('type', 'radio');
                m5Input.setAttribute('checked', 'checked');
                m5Input.setAttribute('name', 'character');
                m5Input.setAttribute('value', 'character_m5');
                m5Input.setAttribute('id', 'm5');
                m5Input.className = 'character';

                male.setAttribute('id', 'male-character');
                male.appendChild(m1Input);
                male.appendChild(m1Label);
                male.appendChild(m2Input);
                male.appendChild(m2Label);
                male.appendChild(m3Input);
                male.appendChild(m3Label);
                male.appendChild(m4Input);
                male.appendChild(m4Label);
                male.appendChild(m5Input);
                male.appendChild(m5Label);
                charactersBlock.appendChild(male);
            } else {
                var oldBlock = document.getElementById('male-character');
                if (oldBlock !== null)
                    oldBlock.parentNode.removeChild(oldBlock);

                var female = document.createElement('div'),
                    mf1Input = document.createElement('input'),
                    mf1Label = document.createElement('label'),
                    mf1Image = document.createElement('img'),
                    mf2Input = document.createElement('input'),
                    mf2Label = document.createElement('label'),
                    mf2Image = document.createElement('img'),
                    mf3Input = document.createElement('input'),
                    mf3Label = document.createElement('label'),
                    mf3Image = document.createElement('img');

                mf1Image.setAttribute('src', '/img/character_fm1.png');
                mf1Label.setAttribute('for', 'mf1');
                mf1Label.appendChild(mf1Image);
                mf1Input.setAttribute('type', 'radio');
                mf1Input.setAttribute('checked', 'checked');
                mf1Input.setAttribute('name', 'character');
                mf1Input.setAttribute('value', 'character_fm1');
                mf1Input.setAttribute('id', 'mf1');
                mf1Input.className = 'character';

                mf2Image.setAttribute('src', '/img/character_fm2.png');
                mf2Label.setAttribute('for', 'mf2');
                mf2Label.appendChild(mf2Image);
                mf2Input.setAttribute('type', 'radio');
                mf2Input.setAttribute('checked', 'checked');
                mf2Input.setAttribute('name', 'character');
                mf2Input.setAttribute('value', 'character_fm2');
                mf2Input.setAttribute('id', 'mf2');
                mf2Input.className = 'character';

                mf3Image.setAttribute('src', '/img/character_fm3.png');
                mf3Label.setAttribute('for', 'mf3');
                mf3Label.appendChild(mf3Image);
                mf3Input.setAttribute('type', 'radio');
                mf3Input.setAttribute('checked', 'checked');
                mf3Input.setAttribute('name', 'character');
                mf3Input.setAttribute('value', 'character_fm3');
                mf3Input.setAttribute('id', 'mf3');
                mf3Input.className = 'character';


                female.setAttribute('id', 'female-character');
                female.appendChild(mf1Input);
                female.appendChild(mf1Label);
                female.appendChild(mf2Input);
                female.appendChild(mf2Label);
                female.appendChild(mf3Input);
                female.appendChild(mf3Label);

                charactersBlock.appendChild(female);
            }
        }

        showCharacterBlock($('[name="sex"]').val());

        $('[name="sex"]').change(function () {
            showCharacterBlock($(this).val());
        });
    }

    if(document.getElementById('showDailyStatistic') !== null){
        $('#showDailyStatistic').click(function(){
        $.ajax({
            url: '/tstatistic',
            method: 'get',
            success: function (data) {
                $('#modal').find('.modal-content').html(data);
                $('#modal').modal('show');
            }
        });
        });
    }



    if(document.getElementById('todoListBlock') !== null){
        $.ajax({
            url: '/todo/list',
            method: 'get',
            success: function (data) {
                $('#todoListBlock').html(data);
                if(document.getElementById('newTodoButton') !== null) {
                    $('#newTodoButton').click(function () {
                        token = $('meta[name="csrf-token"]').attr('content');

                        var modalHeader = ' \
                <div class="modal-header"> \
                    <h5 class="modal-title">Adding new 2Do</h5> \
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> \
                        <span aria-hidden="true">&times;</span> \
                    </button> \
                </div> \
           ';

                        var modalBody = ' \
                <div class="modal-body"> \
                <form id="todoAddForm" action="/todo/add" method="post" role="form"> \
                <input name="_token" type="hidden" value="'+token+'" >\
                <div class="form-group"> \
                    <label for="title" class="form-control-label">Title:</label> \
                    <input type="text" class="form-control" id="title" name="title"> \
                </div> \
                <div class="form-group"> \
                    <label for="description" class="form-control-label">Description:</label> \
                    <textarea class="form-control" id="description" name="description"></textarea> \
                </div> \
               <fieldset class="form-group"> \
                <legend>When execute?</legend> \
            <div class="form-check"> \
                <label class="form-check-label"> \
                <input type="radio" class="form-check-input" name="when" id="today" value="today" checked> \                \
                Today \
            </label> \
            </div> \
            <div class="form-check"> \
                <label class="form-check-label"> \
                <input type="radio" class="form-check-input" name="when" id="tomorrow" value="tomorrow"> \
                Tomorrow \
            </label> \
            </div> \
            </fieldset> \
            ';

                        var modalFooter = ' \
            <div class="modal-footer"> \
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> \
                <button class="btn btn-main">Add new 2Do</button> \
            </div> \
            ';

                        var modalContent = modalHeader + modalBody + modalFooter;

                        $('#modal').find('.modal-content')
                            .html('')
                            .append(modalContent)
                            .find('#todoAddForm')
                            .submit(function(e){
                                if($('#title').val() == ''){
                                    formBlock = document.getElementById('title').parentNode;
                                    formBlock.className += " has-error";
                                    errorBlock = document.createElement('span');
                                    errorBlock.className = "help-block";
                                    errorTextBlock = document.createElement('strong');
                                    errorText = document.createTextNode('Fiald title empty');
                                    errorTextBlock.appendChild(errorText);
                                    errorBlock.appendChild(errorTextBlock);
                                    formBlock.appendChild(errorBlock);

                                    setTimeout(function () {
                                        formBlock.removeChild(errorBlock);
                                    }, 2000);

                                    e.preventDefault();
                                }

                                else if($('#title').val().length > 60){
                                    formBlock = document.getElementById('title').parentNode;
                                    formBlock.className += " has-error";
                                    errorBlock = document.createElement('span');
                                    errorBlock.className = "help-block";
                                    errorTextBlock = document.createElement('strong');
                                    errorText = document.createTextNode('Value should not exceed 60 characters!');
                                    errorTextBlock.appendChild(errorText);
                                    errorBlock.appendChild(errorTextBlock);
                                    formBlock.appendChild(errorBlock);

                                    setTimeout(function () {
                                        formBlock.removeChild(errorBlock);
                                    }, 2000);

                                    e.preventDefault();
                                }
                            });
                        $('#modal').modal('show');
                    });
                }
                if(document.getElementsByClassName('view-todo').length > 0) {
                    $('.view-todo').click(function () {
                        var targetId = $(this).attr('data-target');

                        var modalHeader = ' \
                            <div class="modal-header"> \
                                <h5 class="modal-title"></h5> \
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> \
                                    <span aria-hidden="true">&times;</span> \
                                </button> \
                            </div> \
                       ';

                                    var modalBody = ' \
                            <div class="modal-body"> \
                            <div class="loader">Loading...</div> \
                            </div> \
                        ';

                                    var modalFooter = ' \
                        <div class="modal-footer"> \
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> \
                        </div> \
                        ';

                        var modalContent = modalHeader + modalBody + modalFooter;

                        $('#modal').find('.modal-content')
                            .html('')
                            .append(modalContent);
                        $('#modal').modal('show');

                        $.ajax({
                            url: '/todo/'+targetId,
                            method: 'get',
                            success: function (data) {
                                $('#modal').find('.modal-content')
                                    .html('')
                                    .append(data);


                                $('#editButton').click(function () {
                                    $.ajax({
                                        url: '/todo/edit/'+targetId,
                                        method: 'get',
                                        success: function (data) {
                                            $('#modal').find('.modal-content')
                                                .html('')
                                                .append(data);
                                        }
                                    })
                                });
                            }
                        })
                    });
                }

                $('#todoListBlock').find('.checkbox').change(function(e){
                    targetId = $(this).attr('data-target');
                    console.log(targetId);
                   $.ajax({
                       url: '/todo/'+targetId+'/status',
                       method: 'get'
                   });
                });

                $('#todoListBlock').find('.delete-todo').click(function(e){
                    targetId = $(this).attr('data-target');
                    console.log(targetId);
                    $.ajax({
                        url: '/todo/'+targetId+'/delete',
                        method: 'get',
                        success: function () {
                            parent = document.getElementById('todo'+targetId).parentNode;
                            parent.parentNode.removeChild(parent);
                        }
                    });
                });
            }
        })
    }


    if(document.getElementById('imgNav') !== null){
        $('.navItem').click(function () {
            $('.navItem.activeItem').removeClass('activeItem');
            $(this).addClass('activeItem');
            $('#mainContentBlock').html('<div class="loader">Loading...</div>');
            $.ajax({
                url: '/page/'+$(this).attr('data-target'),
                method: 'get',
                success: function(data){
                    $('#mainContentBlock').html(data);

                    if(document.getElementById('userTeamBlock') !== null){
                        $.ajax({
                            url: '/team/get',
                            method: 'get',
                            success: function (data) {
                                $('#createdTeamsBlock').html(data);
                                $('#openCreateTeamButton').click(function () {
                                    token = $('meta[name="csrf-token"]').attr('content');

                                    var modalHeader = ' \
                <div class="modal-header"> \
                    <h5 class="modal-title">Create new team</h5> \
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> \
                        <span aria-hidden="true">&times;</span> \
                    </button> \
                </div> \
           ';

                                    var modalBody = ' \
                <form id="teamAddForm" action="/team/add" method="post" role="form"> \
                <div class="modal-body"> \
                <div style="text-align: center"> \
                <img src="img/giphy9.gif"> \
                </div> \
                <input name="_token" type="hidden" value="'+token+'" >\
                <div class="form-group"> \
                    <label for="name" class="form-control-label">Name:</label> \
                    <input type="text" class="form-control" id="name" name="name"> \
                </div> \
                <div class="form-group"> \
                    <label for="description" class="form-control-label">Description:</label> \
                    <textarea class="form-control" id="description" name="description"></textarea> \
                </div> \
                <div class="form-group"> \
                    <label for="color" class="form-control-label">Color:</label> \
                    <input type="color" class="form-control" id="color" name="color"> \
                </div> \
                \
            ';

                                    var modalFooter = ' \
            <div class="modal-footer"> \
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> \
                <button class="btn btn-main">Create new team</button> \
            </div> \
            </form> \
            ';

                                    var modalContent = modalHeader + modalBody + modalFooter;

                                    $('#modal').find('.modal-content')
                                        .html('')
                                        .append(modalContent)
                                        .find('#teamAddForm')
                                        .submit(function(e){
                                            if($('#name').val() == ''){
                                                formBlock = document.getElementById('name').parentNode;
                                                formBlock.className += " has-error";
                                                errorBlock = document.createElement('span');
                                                errorBlock.className = "help-block";
                                                errorTextBlock = document.createElement('strong');
                                                errorText = document.createTextNode('Fiald name empty');
                                                errorTextBlock.appendChild(errorText);
                                                errorBlock.appendChild(errorTextBlock);
                                                formBlock.appendChild(errorBlock);

                                                setTimeout(function () {
                                                    formBlock.removeChild(errorBlock);
                                                }, 2000);

                                                e.preventDefault();
                                            }

                                            else if($('#name').val().length > 10){
                                                formBlock = document.getElementById('name').parentNode;
                                                formBlock.className += " has-error";
                                                errorBlock = document.createElement('span');
                                                errorBlock.className = "help-block";
                                                errorTextBlock = document.createElement('strong');
                                                errorText = document.createTextNode('Value should not exceed 10 characters!');
                                                errorTextBlock.appendChild(errorText);
                                                errorBlock.appendChild(errorTextBlock);
                                                formBlock.appendChild(errorBlock);

                                                setTimeout(function () {
                                                    formBlock.removeChild(errorBlock);
                                                }, 2000);

                                                e.preventDefault();
                                            }
                                        });
                                    $('#modal').modal('show');
                                });
                            }
                        });
                        $.ajax({
                            url: '/team/list',
                            method: 'get',
                            success: function (data) {
                                $('#userTeamBlock').html(data);
                            }
                        });
                        $.ajax({
                            url: '/team/invite',
                            method: 'get',
                            success: function (data) {
                                if(data != false){
                                    $('#inviteBlock').html('<button id="seeAllInvite" class="btn btn-default">U have <span class="badge badge-default">'+data+'</span> invite</button>');

                                    $('#seeAllInvite').click(function () {
                                        $.ajax({
                                            url: '/team/get/invite',
                                            method: 'get',
                                            success: function (data) {
                                                $('#inviteBlock').html(data);
                                            }
                                        })
                                    })
                                }
                            }
                        });
                    }

                    if(document.getElementById('createEventButton') !== null){
                        $('#createEventButton').click(function(){
                            $.ajax({
                                url: '/event/add',
                                method: 'get',
                                success: function (modal) {
                                    $('#modal').find('.modal-content').html(modal);
                                    $('#modal').modal('show');
                                }
                            })


                        });

                        $.ajax({
                            url: '/event/list',
                            method: 'get',
                            success: function (list) {
                                $('#eventBlock').html(list);


                                $('.view-event').click(function () {
                                    var targetId = $(this).attr('data-target');

                                    var modalHeader = ' \
                            <div class="modal-header"> \
                                <h5 class="modal-title"></h5> \
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> \
                                    <span aria-hidden="true">&times;</span> \
                                </button> \
                            </div> \
                       ';

                                    var modalBody = ' \
                            <div class="modal-body"> \
                            <div class="loader">Loading...</div> \
                            </div> \
                        ';

                                    var modalFooter = ' \
                        <div class="modal-footer"> \
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> \
                        </div> \
                        ';

                                    var modalContent = modalHeader + modalBody + modalFooter;

                                    $('#modal').find('.modal-content')
                                        .html('')
                                        .append(modalContent);
                                    $('#modal').modal('show');

                                    $.ajax({
                                        url: '/event/'+targetId,
                                        method: 'get',
                                        success: function (data) {
                                            $('#modal').find('.modal-content')
                                                .html('')
                                                .append(data);


                                            $('#editButton').click(function () {
                                                $.ajax({
                                                    url: '/event/edit/'+targetId,
                                                    method: 'get',
                                                    success: function (data) {
                                                        $('#modal').find('.modal-content')
                                                            .html('')
                                                            .append(data);
                                                    }
                                                })
                                            });
                                        }
                                    })
                                });

                                $('#eventBlock').find('.checkbox').change(function(e){
                                    targetId = $(this).attr('data-target');
                                    console.log(targetId);
                                    $.ajax({
                                        url: '/event/'+targetId+'/status',
                                        method: 'get'
                                    });
                                });

                                $('#eventBlock').find('.delete-event').click(function(e){
                                    targetId = $(this).attr('data-target');
                                    console.log(targetId);
                                    $.ajax({
                                        url: '/event/'+targetId+'/delete',
                                        method: 'get',
                                        success: function () {
                                            parent = document.getElementById('event'+targetId).parentNode;
                                            parent.parentNode.removeChild(parent);
                                        }
                                    });
                                });
                            }
                        });

                        $.ajax({
                            url: '/event/list/completed',
                            method: 'get',
                            success: function (list) {

                                $('#complatedEventBlock').html(list);


                                $('.view-event').click(function () {
                                    var targetId = $(this).attr('data-target');

                                    var modalHeader = ' \
                            <div class="modal-header"> \
                                <h5 class="modal-title"></h5> \
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> \
                                    <span aria-hidden="true">&times;</span> \
                                </button> \
                            </div> \
                       ';

                                    var modalBody = ' \
                            <div class="modal-body"> \
                            <div class="loader">Loading...</div> \
                            </div> \
                        ';

                                    var modalFooter = ' \
                        <div class="modal-footer"> \
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> \
                        </div> \
                        ';

                                    var modalContent = modalHeader + modalBody + modalFooter;

                                    $('#modal').find('.modal-content')
                                        .html('')
                                        .append(modalContent);
                                    $('#modal').modal('show');

                                    $.ajax({
                                        url: '/event/'+targetId,
                                        method: 'get',
                                        success: function (data) {
                                            $('#modal').find('.modal-content')
                                                .html('')
                                                .append(data);


                                            $('#editButton').click(function () {
                                                $.ajax({
                                                    url: '/event/edit/'+targetId,
                                                    method: 'get',
                                                    success: function (data) {
                                                        $('#modal').find('.modal-content')
                                                            .html('')
                                                            .append(data);
                                                    }
                                                })
                                            });
                                        }
                                    })
                                });

                                $('#complatedEventBlock').find('.checkbox').change(function(e){
                                    targetId = $(this).attr('data-target');
                                    console.log(targetId);
                                    $.ajax({
                                        url: '/event/'+targetId+'/status',
                                        method: 'get'
                                    });
                                });

                                $('#complatedEventBlock').find('.delete-event').click(function(e){
                                    targetId = $(this).attr('data-target');
                                    console.log(targetId);
                                    $.ajax({
                                        url: '/event/'+targetId+'/delete',
                                        method: 'get',
                                        success: function () {
                                            parent = document.getElementById('event'+targetId).parentNode;
                                            parent.parentNode.removeChild(parent);
                                        }
                                    });
                                });
                            }
                        });
                    }
                }
            })

        });

        $('[data-target="team"]').click();
    }




    if(document.getElementById('sendIbviteButton') !== null){
            $('#newTodoButton').click(function(){
            $('html, body').animate({
                scrollTop: $("#createTeamTodo").offset().top
            }, 500);
        });

        $('#sendIbviteButton').click(function () {
            token = $('meta[name="csrf-token"]').attr('content');

            var modalHeader = ' \
                <div class="modal-header"> \
                    <h5 class="modal-title">Sending invite</h5> \
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> \
                        <span aria-hidden="true">&times;</span> \
                    </button> \
                </div> \
           ';

            var modalBody = ' \
                <form id="sendInviteForm" role="form"> \
                <div class="modal-body"> \
                <input name="_token" type="hidden" value="'+token+'" >\
                <div class="form-group"> \
                    <label for="invite" class="form-control-label">User name or email:</label> \
                    <input type="text" class="form-control" id="invite" name="invite"> \
                </div> \
            ';

            var modalFooter = ' \
            <div class="modal-footer"> \
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> \
                <button class="btn btn-main">Send invite</button> \
            </div> \
            </form> \
            ';

            var modalContent = modalHeader + modalBody + modalFooter;

            $('#modal').find('.modal-content')
                .html('')
                .append(modalContent)
                .find('#sendInviteForm')
                .submit(function(e){

                    e.preventDefault();

                    if($('#invite').val() == ''){
                        formBlock = document.getElementById('invite').parentNode;
                        formBlock.className += " has-error";
                        errorBlock = document.createElement('span');
                        errorBlock.className = "help-block";
                        errorTextBlock = document.createElement('strong');
                        errorText = document.createTextNode('Write user name or email');
                        errorTextBlock.appendChild(errorText);
                        errorBlock.appendChild(errorTextBlock);
                        formBlock.appendChild(errorBlock);

                        setTimeout(function () {
                            formBlock.removeChild(errorBlock);
                        }, 2000);

                    } else {
                        $.ajax({
                            url: '/team/invite/'+$('#invite').val(),
                            method: 'get',
                            success: function (data) {
                                if (data == false){
                                    formBlock = document.getElementById('invite').parentNode;
                                    formBlock.className += " has-error";
                                    errorBlock = document.createElement('span');
                                    errorBlock.className = "help-block";
                                    errorTextBlock = document.createElement('strong');
                                    errorText = document.createTextNode('User does not exist');
                                    errorTextBlock.appendChild(errorText);
                                    errorBlock.appendChild(errorTextBlock);
                                    formBlock.appendChild(errorBlock);

                                    setTimeout(function () {
                                        formBlock.removeChild(errorBlock);
                                    }, 2000);
                                } else {
                                    location.href = location.href;
                                }
                            }
                        });
                    }

                });
            $('#modal').modal('show');
        })
    }

    if(document.getElementById('createTeamTodo') !== null) {
        $('#createTeamTodo')
            .submit(function (e) {
                if ($('#title').val() == '') {
                    formBlock = document.getElementById('title').parentNode;
                    formBlock.className += " has-error";
                    errorBlock = document.createElement('span');
                    errorBlock.className = "help-block";
                    errorTextBlock = document.createElement('strong');
                    errorText = document.createTextNode('Fiald title empty');
                    errorTextBlock.appendChild(errorText);
                    errorBlock.appendChild(errorTextBlock);
                    formBlock.appendChild(errorBlock);

                    setTimeout(function () {
                        formBlock.removeChild(errorBlock);
                    }, 2000);

                    e.preventDefault();
                }

                else if ($('#title').val().length > 60) {
                    formBlock = document.getElementById('title').parentNode;
                    formBlock.className += " has-error";
                    errorBlock = document.createElement('span');
                    errorBlock.className = "help-block";
                    errorTextBlock = document.createElement('strong');
                    errorText = document.createTextNode('Value should not exceed 60 characters!');
                    errorTextBlock.appendChild(errorText);
                    errorBlock.appendChild(errorTextBlock);
                    formBlock.appendChild(errorBlock);

                    setTimeout(function () {
                        formBlock.removeChild(errorBlock);
                    }, 2000);

                    e.preventDefault();
                }
            });
    }

    if(document.getElementById('teamTodoListBlock') !== null) {
        $.ajax({
            url: '/team/todo/list/'+$('[name="team"]').val(),
            method: 'get',
            success: function (data) {
                $('#teamTodoListBlock').html(data);

                if(document.getElementsByClassName('view-todo').length > 0) {
                    $('.view-todo').click(function () {
                        var targetId = $(this).attr('data-target');

                        var modalHeader = ' \
                            <div class="modal-header"> \
                                <h5 class="modal-title"></h5> \
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> \
                                    <span aria-hidden="true">&times;</span> \
                                </button> \
                            </div> \
                       ';

                        var modalBody = ' \
                            <div class="modal-body"> \
                            <div class="loader">Loading...</div> \
                            </div> \
                        ';

                        var modalFooter = ' \
                        <div class="modal-footer"> \
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> \
                        </div> \
                        ';

                        var modalContent = modalHeader + modalBody + modalFooter;

                        $('#modal').find('.modal-content')
                            .html('')
                            .append(modalContent);
                        $('#modal').modal('show');

                        $.ajax({
                            url: '/team/todo/'+targetId,
                            method: 'get',
                            success: function (data) {
                                $('#modal').find('.modal-content')
                                    .html('')
                                    .append(data);

                                $('#editButton').click(function () {
                                    $.ajax({
                                        url: '/team/todo/edit/'+targetId,
                                        method: 'get',
                                        success: function (data) {
                                            $('#modal').find('.modal-content')
                                                .html('')
                                                .append(data);
                                        }
                                    })
                                });
                            }
                        })
                    });
                }

                $('#teamTodoListBlock').find('.checkbox').change(function(e){
                    targetId = $(this).attr('data-target');
                    console.log(targetId);
                    $.ajax({
                        url: '/team/todo/'+targetId+'/status',
                        method: 'get'
                    });
                });

                $('#teamTodoListBlock').find('.delete-todo').click(function(e){
                    targetId = $(this).attr('data-target');
                    console.log(targetId);
                    $.ajax({
                        url: '/team/todo/'+targetId+'/delete',
                        method: 'get',
                        success: function () {
                            parent = document.getElementById('todo'+targetId).parentNode;
                            parent.parentNode.removeChild(parent);
                        }
                    });
                });
            }
        });
    }
});
