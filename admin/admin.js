function signinOTP() {

var reqest = new XMLHttpRequest();

reqest.onreadystatechange = function(){
    if (reqest.readyState == 4 && reqest.status == 200) {
        var response = reqest.responseText;
        if (response != "ok") {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Email Sending fail",
               
              });
        } else {
            Swal.fire({
                icon: "success",
                title: "OTP",
                text: "Email Send Success",
               
              }); 
        }
    }
}


reqest.open("POST","adminOTPProcess.php",true);
reqest.send();


}



function adminSignin(){

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var otp = document.getElementById("otp").value;

    var f = new FormData();

    f.append("em",email);
    f.append("pw",password);
    f.append("otp",otp);
  

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {
        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;
            if (response != "ok") {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: response,
                   
                  });
            } else {
               
                window.location.assign("index.php");

            }
        }
    }


    reqest.open("POST","adminSigninProcess.php",true);
    reqest.send(f);


}

function adminSignout(){
    window.location.assign("signin.php");
    var reqest = new XMLHttpRequest();

    reqest.open("POST","adminSignoutProcess.php",true);
    reqest.send();

}

function changeWriterStatus(wid){

    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 6500
      });

    var f = new FormData();

    f.append("wid",wid);


    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function (){

        if (reqest.readyState == 4 && reqest.status == 200) {
            
            var response = reqest.responseText;
  
            if (response == "d") {
                Swal.fire({
                    icon: "warning",
                    title: "Writer Status",
                    text: "Writer Deactivated Successfully",
                   
                  });
                  document.getElementById("wstatus").innerHTML ='<span class="badge bg-danger">Inactive</span>';
            } else if (response == "a") {
                Swal.fire({
                    icon: "success",
                    title: "Writer Status",
                    text: "Writer Activated Successfully",
                   
                  });
                  document.getElementById("wstatus").innerHTML ='<span class="badge bg-success">Active</span>';
            }


        }

    }


    reqest.open("POST", "changeWriterStatusProcess.php",true);
    reqest.send(f);

}

function changeUserStatus(uid){

    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 3500
      });


    var f = new FormData();

    f.append("uid",uid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function (){

        if (reqest.readyState == 4 && reqest.status == 200) {
            
            var response = reqest.responseText;
            
            if (response == "d") {
                Swal.fire({
                    icon: "warning",
                    title: "User Status",
                    text: "User Deactivated Successfully",
                   
                  });
                  document.getElementById("ustatus").innerHTML ='<span class="badge bg-danger">Inactive</span>';
            } else if (response == "a") {
                Swal.fire({
                    icon: "success",
                    title: "User Status",
                    text: "User Activated Successfully",
                   
                  });
                  document.getElementById("ustatus").innerHTML ='<span class="badge bg-success">Active</span>';
            }


        }

    }

    reqest.open("POST", "changeUserStatusProcess.php",true);
    reqest.send(f);
    
}

function papprove(pid){


    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 3500
      });


    var f = new FormData();

    f.append("pid",pid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function(){

        if (reqest.readyState == 4 && reqest.status == 200)  {
            var response = reqest.responseText;
            
            if (response == "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Post Status",
                    text: "User Approved Successfully",
                   
                  });
                 
            } else{

                Swal.fire({
                    icon: "warning",
                    title: "Post Status",
                    text: response,
                   
                  });
            }


        }

    }




    reqest.open("POST","postApproveProcess.php",true);
    reqest.send(f);


}

function pedit(pid){


    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 3500
      });


    var f = new FormData();

    f.append("pid",pid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function(){

        if (reqest.readyState == 4 && reqest.status == 200)  {
            var response = reqest.responseText;
            alert(response);
        }

    }

    reqest.open("POST","postEditProcess.php",true);
    reqest.send(f);
}

function pdisapprove(pid){



     Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 3500
      });



    var f = new FormData();

    f.append("pid",pid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function(){

        if (reqest.readyState == 4 && reqest.status == 200)  {
            var response = reqest.responseText;
            alert(response);
        }

    }

    reqest.open("POST","postDispproveProcess.php",true);
    reqest.send(f);
}