function Form() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var span0 = document.getElementsByTagName("span")[0];
    var span1 = document.getElementsByTagName("span")[1];
    var isValid = true;

    span0.innerHTML = "";
    span1.innerHTML = "";

    if (email === "") {
        span0.innerHTML = "Please enter your email.";
        isValid = false;
    }

    if (password === "") {
        span1.innerHTML = "Please enter your password.";
        isValid = false;
    }

    return isValid;
}