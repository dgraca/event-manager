import intlTelInput from 'intl-tel-input';
//import 'intl-tel-input/build/js/utils'; auto include utils not in use
window.intlTelInput = intlTelInput;

function loadPhone(id) {
    var phoneInput = document.querySelector(`#${id}_temp`),
        errorMsg = document.querySelector(`#phone-error-msg-${id}`);

    var errorMap = {
        0: "{{ __('Invalid number') }}",
        1: "{{ __('Invalid country code') }}",
        2: "{{ __('Too short') }}",
        3: "{{ __('Too long') }}",
        4: "{{ __('Invalid number') }}",
        '-99': "{{ __('Invalid number') }}"
    };

    var reset = function() {
        phoneInput.classList.remove('!border-danger');
        errorMsg.innerHTML = '';
        errorMsg.classList.remove('block');
        errorMsg.classList.add('hidden');
    };

    var iti = intlTelInput(phoneInput, {
        utilsScript: '/build/js/intl-tel-input/utils.js',
        preferredCountries: ['pt'],
});

    phoneInput.addEventListener('blur', function() {
        reset();
        var element = document.getElementById(id);
        if (phoneInput.value.trim()) {
            if (iti.isValidNumber()) {
                element.value = iti.getNumber();
            } else {
                element.value = "";
                phoneInput.classList.add('!border-danger');
                var errorCode = iti.getValidationError();
                errorMsg.innerHTML = errorMap[errorCode];
                errorMsg.classList.remove("hidden");
                errorMsg.classList.add("block");
            }
        } else {
            element.value = "";
        }
        element.dispatchEvent(new Event('input'));
    });
}

window.loadPhone = loadPhone;
