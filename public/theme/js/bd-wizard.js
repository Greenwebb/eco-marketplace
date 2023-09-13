//Wizard Init

$("#wizard").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "none",       
    titleTemplate: '<span class="bd-wizard-step-indicator"></span><h6 class="bd-wizard-step-title">#title#</h6>',
    onStepChanged: function (e, index , previndex) {
        console.log(e ,index, previndex);
        let steps = document.querySelector('#wizard .steps');

        if( index === 1) {
            steps.classList.add('second-step-active');
            steps.classList.remove('third-step-active','last-step-active');
        } else if (index === 2) {
            steps.classList.add('third-step-active');
            steps.classList.remove('second-step-active','last-step-active');
        } else if (index === 3) {
            steps.classList.add('last-step-active');
            steps.classList.remove('second-step-active','third-step-active');
        }else {
            steps.classList.remove('second-step-active','third-step-active','last-step-active');
        }

    },
    onFinished: function() {
        alert("Form successfully submitted!");
        location.reload();
    },
    labels: {
        previous: "Back",
    }
});

//Form control

$('.purpose-radio-input').on('change', function(e) {
    $('#selectedBusiness').text(e.target.value);
});

$('#username').on('change', function(e) {
    $('#enteredUsername').text(e.target.value);
});

$('#phoneNumber').on('change', function(e) {
    $('#enteredPhoneNumber').text(e.target.value);
});

$('#location').on('change', function(e) {
    $('#enteredLocation').text(e.target.value);
});

$('#zipcode').on('change', function(e) {
    $('#enteredZipcode').text(e.target.value);
});

$('#cardNumber').on('change', function(e) {
    let str = e.target.value;
    let value = new Array(str.length - 4 + 1).join('x') + str.slice(-4);
    $('#enteredCard').text(value);
});

$('#expiration').on('change', function(e) {
    $('#cardExpiration').text(e.target.value);
});

