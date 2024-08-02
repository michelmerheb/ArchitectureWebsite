

function sendMail(event) {
    event.preventDefault();
    let parms  = {
        first_name: document.getElementById("first-name-input").value,
        email: document.getElementById("email-input").value,
        phone: document.getElementById("phone-input").value,
        details: document.getElementById("details-input").value
    }

    emailjs.send('service_7h7k3e5', 'template_0z97nfd', parms)
        .then(function() { 
            window.location.href="Thankyou.html"; 
        }, function(error) { 
            alert("Email failed to send! Please try again later.");
        });
}

function subscribe(event) {
    event.preventDefault();
    let email = document.getElementById("email-input").value;

    let templateParams = {
        email: email
    };

    // Send notification email to you
    emailjs.send('service_7h7k3e5', 'template_op0361g', templateParams)
        .then(function() {
            window.location.href="index.html";
        })
}