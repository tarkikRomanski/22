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

        if($('#password').val().length < 6) {

            var passwordBlock = document.getElementById('password-block');
            passwordBlock.className += " has-error";
            var errorBlock = document.createElement('span');
            errorBlock.className = "help-block";
            var errorTextBlock = document.createElement('strong');
            var errorText = document.createTextNode('The password must be at least 6 characters.');
            errorTextBlock.appendChild(errorText);
            errorBlock.appendChild(errorTextBlock);
            passwordBlock.appendChild(errorBlock);
            $('html, body').animate({
                scrollTop: $("#password-block").offset().top
            }, 2000);
            e.preventDefault();
        } else if($('#password').val() != $('#password-confirm').val()) {
            var passwordBlock = document.getElementById('password-block');
            passwordBlock.className += " has-error";
            var errorBlock = document.createElement('span');
            errorBlock.className = "help-block";
            var errorTextBlock = document.createElement('strong');
            var errorText = document.createTextNode('The password confirmation does not match.');
            errorTextBlock.appendChild(errorText);
            errorBlock.appendChild(errorTextBlock);
            passwordBlock.appendChild(errorBlock);
            $('html, body').animate({
                scrollTop: $("#password-block").offset().top
            }, 2000);
            e.preventDefault();
        }

    });

    var showCharacterBlock = function(sex){
        var charactersBlock = document.getElementById('characters');

        if(sex == "male"){
            var oldBlock = document.getElementById('female-character');
            if(oldBlock !== null)
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
            if(oldBlock !== null)
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

    $('[name="sex"]').change(function(){
        showCharacterBlock($(this).val());
    });
});