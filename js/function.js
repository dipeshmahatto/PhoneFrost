function Form() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;

    var span0 = document.getElementById("span1")[0];
    var span1 = document.getElementById("span2")[1];
    var span2 = document.getElementById("span3")[2];
    var span3 = document.getElementById("span4")[3];
    var span4 = document.getElementById("span5")[4];

    var button = document.getElementById("button");

    var isValid = true;

    span0.innerHTML = "";
    span1.innerHTML = "";
    span2.innerHTML = "";
    span3.innerHTML = "";
    span4.innerHTML = "";

    var namePattern = /^[A-Za-z]+\s[A-Za-z]+$/;
    if (name === "") {
        span0.innerHTML = "Please enter your full name.";
        isValid = false;
    } else if (!namePattern.test(name)) {
        span0.innerHTML = "Please enter a valid full name (at least first and last name).";
        isValid = false;
    }

    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (email === "") {
        span1.innerHTML = "Please enter your email.";
        isValid = false;
    } else if (!emailPattern.test(email)) {
        span1.innerHTML = "Please enter a valid email address.";
        isValid = false;
    }

    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
    if (password === "") {
        span2.innerHTML = "Please enter a password.";
        isValid = false;
    } else if (!passwordPattern.test(password)) {
        span2.innerHTML = "Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.";
        isValid = false;
    }

    if (cpassword === "") {
        span3.innerHTML = "Please confirm your password.";
        isValid = false;
    } else if (password !== cpassword) {
        span3.innerHTML = "Passwords do not match.";
        isValid = false;
    }

    button.disabled = !isValid;

    return isValid;
}
