const form = document.querySelector("form");
const emailInput = form.querySelector('input[name = "email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');
const passwordInput = form.querySelector('input[name="password"]');

function isEmail(email){
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword){
    return password === confirmedPassword;
}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function passwordValidation(){
    setTimeout(function () {

            const condition = arePasswordsSame(
                passwordInput.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
            markValidation(passwordInput, condition)
        },
        1000);
}

emailInput.addEventListener('keyup', function () {
    setTimeout(function () {
        markValidation(emailInput, isEmail(emailInput.value))
    },
        1000);
});

confirmedPasswordInput.addEventListener('keyup', passwordValidation);
passwordInput.addEventListener('keyup', passwordValidation);