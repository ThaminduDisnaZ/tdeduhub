function signinOTP() {

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {
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


    reqest.open("POST", "adminOTPProcess.php", true);
    reqest.send();


}



function adminSignin() {

    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var otp = document.getElementById("otp").value;

    var f = new FormData();

    f.append("em", email);
    f.append("pw", password);
    f.append("otp", otp);


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


    reqest.open("POST", "adminSigninProcess.php", true);
    reqest.send(f);


}

function adminSignout() {
    window.location.assign("signin.php");
    var reqest = new XMLHttpRequest();

    reqest.open("POST", "adminSignoutProcess.php", true);
    reqest.send();

}

function changeWriterStatus(wid) {

    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 10000
    });

    var f = new FormData();

    f.append("wid", wid);


    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {

            var response = reqest.responseText;

            if (response == "d") {
                Swal.fire({
                    icon: "warning",
                    title: "Writer Status",
                    text: "Writer Deactivated Successfully",

                });
                document.getElementById("wstatus").innerHTML = '<span class="badge bg-danger">Inactive</span>';
            } else if (response == "a") {
                Swal.fire({
                    icon: "success",
                    title: "Writer Status",
                    text: "Writer Activated Successfully",

                });
                document.getElementById("wstatus").innerHTML = '<span class="badge bg-success">Active</span>';
            }


        }

    }


    reqest.open("POST", "changeWriterStatusProcess.php", true);
    reqest.send(f);

}

function changeUserStatus(uid) {

    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 10000
    });


    var f = new FormData();

    f.append("uid", uid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {

            var response = reqest.responseText;

            if (response == "d") {
                Swal.fire({
                    icon: "warning",
                    title: "User Status",
                    text: "User Deactivated Successfully",

                });
                document.getElementById("ustatus").innerHTML = '<span class="badge bg-danger">Inactive</span>';
            } else if (response == "a") {
                Swal.fire({
                    icon: "success",
                    title: "User Status",
                    text: "User Activated Successfully",

                });
                document.getElementById("ustatus").innerHTML = '<span class="badge bg-success">Active</span>';
            }


        }

    }

    reqest.open("POST", "changeUserStatusProcess.php", true);
    reqest.send(f);

}

function papprove(pid) {


    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 10000
    });


    var f = new FormData();

    f.append("pid", pid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;

            if (response == "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Post Status",
                    text: "Post Approved Successfully",

                });

            } else {

                Swal.fire({
                    icon: "warning",
                    title: "Post Status",
                    text: response,

                });
            }


        }

    }

    reqest.open("POST", "postApproveProcess.php", true);
    reqest.send(f);


}




function changeProductImage() {
    var image = document.getElementById("imageuploader");

    image.onchange = function () {
        var file_count = image.files.length;

        if (file_count === 1) {
            var file = image.files[0];
            var url = window.URL.createObjectURL(file);

            document.getElementById("i").src = url;
        } else {
            alert("Image Upload Error");
        }
    }
}





function pedit(pid) {
    var content = quill.root.innerHTML;
    var title = document.getElementById("title").value;
    var summery = document.getElementById("summery").value;
    var cat = document.getElementById("category").value;
    var image = document.getElementById("imageuploader").files[0];

    var f = new FormData();

    f.append("content", content);
    f.append("summery", summery);
    f.append("title", title);
    f.append("cat", cat);
    f.append("image", image);
    f.append("pid", pid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {
        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;
            if (response == "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Post Change Status",
                    text: "Post Changed Successfully",

                });
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "Post Change Status",
                    text: response,

                });
            }
        }
    }

    reqest.open("POST", "editPostProcess.php", true);
    reqest.send(f);
}



function pdisapprove(pid) {

    Swal.fire({
        position: "top-end",
        icon: "warning",
        title: "Please Wait",
        showConfirmButton: false,
        timer: 10000
    });



    var f = new FormData();

    f.append("pid", pid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;

            if (response == "ok") {
                Swal.fire({
                    icon: "success",
                    title: "Post Status",
                    text: "Post Disapproved Successfully",

                });

            } else {

                Swal.fire({
                    icon: "warning",
                    title: "Post Status",
                    text: response,

                });
            }
        }
    }

    reqest.open("POST", "postDispproveProcess.php", true);
    reqest.send(f);
}


function addCat() {

    var name = document.getElementById("cname").value;
    var desc = document.getElementById("cdes").value;

    var f = new FormData();

    f.append("name", name);
    f.append("des", desc);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;
            if (response == "Caregory is Added Successfull") {
                Swal.fire({
                    icon: "success",
                    title: "Caregory Status",
                    text: response,

                });
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "Caregory Status",
                    text: response,

                });
            }

        }

    }




    reqest.open("POST", "addCategoryProcess.php", true);
    reqest.send(f);



}


function inactiveCat(cid) {

    var f = new FormData();


    f.append("cid", cid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;
            if (response == "Category is Deactivated Successfull") {
                Swal.fire({
                    icon: "success",
                    title: "Caregory Status",
                    text: response,

                });
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "Caregory Status",
                    text: response,

                });
            }
        }

    }




    reqest.open("POST", "inactiveCategoryProcess.php", true);
    reqest.send(f);



}


function activeCat(cid) {

    var f = new FormData();


    f.append("cid", cid);

    var reqest = new XMLHttpRequest();

    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;
            if (response == "Category is Activated Successfull") {
                Swal.fire({
                    icon: "success",
                    title: "Caregory Status",
                    text: response,

                });
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "Caregory Status",
                    text: response,

                });
            }
        }

    }




    reqest.open("POST", "activeCategoryProcess.php", true);
    reqest.send(f);



}

function editCat(cid) {
    var ea = document.getElementById("loadEditCat");
    var ta = document.getElementById("catTable");

    ea.className = "";
    ta.className = "hidden";


    var f = new FormData();

    f.append("cid", cid);

    var reqest = new XMLHttpRequest();
    reqest.onreadystatechange = function () {

        if (reqest.readyState == 4 && reqest.status == 200) {
            var response = reqest.responseText;
            ea.innerHTML = response;

        }
    }

    reqest.open("POST", "editCategoryProcess.php", true);
    reqest.send(f);


}

function CancelEditCat() {
    var ea = document.getElementById("loadEditCat");
    var ta = document.getElementById("catTable");

    ea.className = "hidden";
    ta.className = "";


}


function updateCat(cid){
    var name = document.getElementById("cnameu");
    var desc = document.getElementById("cdesu");

var f = new FormData();

f.append("name",name.value);
f.append("des",desc.value);
f.append("cid",cid);


var reqest = new XMLHttpRequest();
reqest.onreadystatechange = function () {

    if (reqest.readyState == 4 && reqest.status == 200) {
        var response = reqest.responseText;
       alert(response);

    }
}

reqest.open("POST", "updateCategoryProcess.php", true);
reqest.send(f);

}