$("#frm-login").on("submit", Login);
$("#frm-create").on("submit", CreateAccount);

function Login(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "../php/login.php",
        data: $("#frm-login").serialize(),
        success: function( result ) {
            result = $.parseJSON(result);

            if(result.success == "1") {
                alert("Login successfully!");
                alert("Hello " + result.username + "!");
                //location.href = "";
            } else {
                alert("Login failed!");
            }
        }
    });

    $("#frm-login").trigger("reset");
}


function CreateAccount(e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "../php/create.php",
        data: $("#frm-create").serialize(),
        success: function( result ) {
            result = $.parseJSON(result);

            if(result.success == "1") {
                alert("Create account successfully!");
                location.href = "../html/login.html";
            } else {
                alert("Creating account failed!");
            }
        }
    });

    $("#frm-create").trigger("reset");
}