    
    // Global variables

    var usernameCheck = false;
    var emailCheck = false;
    var upper = false;
    var lower = false;
    var number = false;
    var length = false;
    var passwordFilled = false;


   /*
   * This
   */
    function checkUsername() {

        var formInput = document.getElementById("userName").value;

    

        if (formInput.length != 0 && formInput.length > 5) {
           
            $.ajax({

                url: " ",
                method: "POST",
                data: {
                    username: formInput
                },
                success: function (result) {
                    if (result != 0) {
                        document.getElementById('checkedU').style.display = "none";
                        document.getElementById("usernameW").innerHTML = "Username already taken.";
                        usernameCheck = false;
                        console.log("Check Username = "+result);
                        disableBtn();
                    } else {
                        document.getElementById("usernameW").innerHTML = "";
                        document.getElementById('checkedU').style.display = "inline";
                        usernameCheck = true;
                        disableBtn();
                    }

                },
                error: function () {
                    console.log("error");
                }

            });
        } else if (formInput.length != 0 && formInput.length < 5) {
            document.getElementById("usernameW").innerHTML = "Username not long enough.";
        }


    }

    function checkEmail() {

        var formInput = document.getElementById("email").value;

        if (formInput.length != 0 &&
            /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(formInput)) {
            $.ajax({

                url: " ",
                method: "POST",
                data: {
                    email: formInput
                },
                success: function (result) { // results returns the count of rows from the DBMS
                    if (result != 0) {
                        document.getElementById('checkedE').style.display = "none";
                        document.getElementById("emailW").innerHTML = "This email is already in use.";
                        emailCheck = false;
                        console.log("Checked email = "+result);
                        disableBtn();
                    } else {
                        document.getElementById("emailW").innerHTML = "";
                        document.getElementById('checkedE').style.display = "inline";
                        emailCheck = true;
                        disableBtn();
                    }

                },
                error: function () {
                    console.log("error");
                }

            });

        } else if (formInput.length != 0 &&
            !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(formInput)) {
                document.getElementById('checkedE').style.display = "none";
            document.getElementById("emailW").innerHTML = "Email not vaild";
        }
    }


    function checkPassword() {
        var upperCrt = 0;
        var lowerCrt = 0;
        var numberCrt = 0;
        var password = document.getElementById('password').value;
        var passLength = password.length;
        var i, j;


        /*
           This checks to see if the password meets the required
           parameters(UpperCase, LowerCase, and Number).
        */

        // To check for an empty field.
        if (passLength == 0) {
            upper = false;
            lower = false;
            number = false;
            document.getElementById('number').style.color = "#d4d3d3";
            document.getElementById('lower').style.color = "#d4d3d3";
            document.getElementById('upper').style.color = "#d4d3d3";
            $('#submitBtn').prop('disabled', true);

        }

        if (passLength >= 7) {
            length = true;
            document.getElementById('length').style.color = "#237223";
        } else {
            length = false;
            document.getElementById('checkedP').style.display = "none";
            document.getElementById('length').style.color = "#d4d3d3";
            disableBtn();
        }


        if (!password.charAt(password.length - 1).match(/^[0-9a-zA-Z]+$/)) {
            // You could put a warning!
        } else {
           
            for (i = 0; i < password.length; i++) {
                if (password.charAt(i).match(/^[A-Z]+$/)) {
                    upperCrt++;
                }
                if (password.charAt(i).match(/^[a-z]+$/)) {
                    lowerCrt++;
                }
                if (password.charAt(i).match(/^[0-9]+$/)) {
                    numberCrt++;
                }
            }

            if (upperCrt > 0) {
                upper = true;
                document.getElementById('upper').style.color = "#237223";

            } else if (upperCrt == 0) {
                upper = false;
                document.getElementById('upper').style.color = "#d4d3d3";

            }

            if (lowerCrt > 0) {
                lower = true;
                document.getElementById('lower').style.color = "#237223";
            } else if (lowerCrt == 0) {
                lower = false;
                document.getElementById('lower').style.color = "#d4d3d3";

            }

            if (numberCrt > 0) {
                number = true;
                document.getElementById('number').style.color = "#237223";

            } else if (numberCrt == 0) {
                number = false;
                document.getElementById('number').style.color = "#d4d3d3";

            }

            /*
             * If Uppercase, LowerCase, Number, and length parameters 
             * are met, then give the green check.
             */
            if (upper && lower && number && length) {
                document.getElementById("passwordW").innerHTML = " ";
                document.getElementById('checkedP').style.display = "inline";
                disableBtn();
            }

            upperCrt = 0;
            lowerCrt = 0;
            numberCrt = 0;


        }





    } // end of checkPassword()

    function disableBtn() {
        if (usernameCheck && emailCheck && upper && lower && number && length) {
            $('#submitBtn').prop('disabled', false);
        } else {
            $('#submitBtn').prop('disabled', true);
        }
    }