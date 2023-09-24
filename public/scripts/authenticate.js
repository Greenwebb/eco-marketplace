const userData = getUrlParameter('user');
const user = JSON.parse(decodeURIComponent(userData));
// Check if userData exists
if (userData) {
    // console.log('check password '+user);
    document.getElementById('theemail').value = user.email;
    document.getElementById('thepassword').value = user.global_secret_word;
    $('#loginModal').modal('show');
    const csrf = '{{ csrf_token() }}';
    sessionStorage.setItem('token', csrf);
    sessionStorage.setItem('authuser', JSON.stringify(user));
    auto_register(user);
   
}

function auto_register(user){
    // Create an object to send to the Laravel controller
    const postData = {
        user: user
    };

    console.log(postData);
    // Make an AJAX POST request to the Laravel controller
    $.ajax({
        type: 'POST',
        url: 'api/auto-login', // Replace with the actual URL of your Laravel controller
        data: postData,
        success: function (response) {
            console.log('Data sent successfully:', response);
        },
        error: function (error) {
            console.error('Error sending data:', error);
        }
    });
}
// Function to extract query parameters from URL
function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    const results = regex.exec(window.location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}