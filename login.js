
// SHOW OR HIDE PASSWORD

function togglePassword(){

    let password =
        document.getElementById("password");

    if(password){

        if(password.type === "password"){

            password.type = "text";
        }

        else{

            password.type = "password";
        }
    }
}





// LOGIN VALIDATION

function validateLogin(){

    let username =
        document.getElementById("username");

    let password =
        document.getElementById("password");

    let errorMessage =
        document.getElementById("error-message");



    // CHECK IF ELEMENTS EXIST

    if(!username || !password){

        return false;
    }



    let usernameValue =
        username.value;

    let passwordValue =
        password.value;



    // PASSWORD RULES

    let passwordPattern =
        /^(?=.[A-Za-z])(?=.\d)(?=.[@$!%#?&])/;



    if(!passwordPattern.test(passwordValue)){

        errorMessage.innerHTML =
            "Password must contain letters, numbers and special characters";

        return false;
    }



    // CORRECT LOGIN DETAILS

    let correctUsername = "Admin";

    let correctPassword = "Admin@123";



    if(usernameValue === correctUsername &&
       passwordValue === correctPassword){



        window.location.href =
            "dashboard.html";

        return false;
    }

    else{

        errorMessage.innerHTML =
            "Invalid Username or Password";

        return false;
    }
}