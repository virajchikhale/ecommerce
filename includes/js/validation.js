function passvalid() {
    var pass = $('#password').val();

    //alert(pass.length);
    var len = pass.length;
    //alert(len);
    if(len < 8){
        alert('Password must be atleast of 8 charechters');
        $('#password').val('');
        $('#password').focus();
    }  
}


function passcon() {
    var pass = $('#password').val();
    var cpass = $('#cpassword').val();

    if(pass != cpass){
        alert('Password Mismatched please try agian');
        $('#cpassword').val('');
        $('#cpassword').focus();
    }  
}


function otp() {
    var raw = $('#otp').val();
    var otp1 = raw.trim();
    //alert(window.otp);
    //alert(otp1);
    //alert(len);
        if(otp1 !== otp){
          alert('Plese enter valid OTP');
          $('#otp').val('');
          $('#otp').focus();
        }  
}


function otp1() {
    var raw = $('#otp').val();
    var otp1 = raw.trim();
    //alert(window.otp);
    //alert(otp1);
    //alert(len);
    if(otp1 == otp){

        var y = document.getElementById("submit");
        y.style.display = "block";

    }
}


function disable() {
    var x = document.getElementById("submit");
    x.style.display = "none";

    
    var x = document.getElementById("box");
    x.style.display = "none";
}