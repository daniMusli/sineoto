function checkPass()
{
    //Store the password field objects into variables ...
    var password = document.getElementById('password');
    var password2 = document.getElementById('password2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#97cc04";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(password.value == password2.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        password2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        password2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Dose Not Match!"
    }
}