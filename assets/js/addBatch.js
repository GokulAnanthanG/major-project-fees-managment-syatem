$(document).ready(() => {
  try {
    if (JSON.parse(localStorage.getItem("FMSUsEr")).pos != "nimda") {
      window.location.href = "index.html";
    }
  } catch (error) {
    window.location.href = "index.html";
  }
  $("#logout").click(() => {
    swal("Are you sure you want to do this?", {
      buttons: ["cancel", true],
    }).then((data) => {
      if (data == true) {
        localStorage.removeItem("FMSUsEr");
        window.location.href = "index.html";
      }
    });
  });

  var batchStatus = false,
    departmentStatus = false,
    semFeesStaus = false,
    otherFeesForSem1Status = false,
    otherFeesForSem2Status = false,
    otherFeesForSem3Status = false,
    otherFeesForSem4Status = false,
    otherFeesForSem5Status = false,
    otherFeesForSem6Status = false;
  $(".addButton").click(() => {
    if ($("#batch").val() != "") {
      $("#batch").css({ "border-color": " black" });
      batchStatus = true;
    } else {
      $("#batch").css({ "border-color": "red" });
      batchStatus = false;
    }
    //batch
    if ($("#department").val() != "") {
      $("#department").css({ "border-color": " black" });
      departmentStatus = true;
    } else {
      $("#department").css({ "border-color": "red" });
      departmentStatus = false;
    }
    //department
    if ($("#semFees").val() != "") {
      $("#semFees").css({ "border-color": " black" });
      semFeesStaus = true;
    } else {
      $("#semFees").css({ "border-color": "red" });
      semFeesStaus = false;
    }
    //semFees
    if ($("#otherFeesForSem1").val() != "") {
      $("#otherFeesForSem1").css({ "border-color": " black" });
      otherFeesForSem1Status = true;
    } else {
      $("#otherFeesForSem1").css({ "border-color": "red" });
      otherFeesForSem1Status = false;
    }
    //Other Fees Sem1
    if ($("#otherFeesForSem2").val() != "") {
      $("#otherFeesForSem2").css({ "border-color": " black" });
      otherFeesForSem2Status = true;
    } else {
      $("#otherFeesForSem2").css({ "border-color": "red" });
      otherFeesForSem2Status = false;
    }
    //Other Fees Sem2
    if ($("#otherFeesForSem3").val() != "") {
      $("#otherFeesForSem3").css({ "border-color": " black" });
      otherFeesForSem3Status = true;
    } else {
      $("#otherFeesForSem3").css({ "border-color": "red" });
      otherFeesForSem3Status = false;
    }
    //Other Fees Sem3
    if ($("#otherFeesForSem4").val() != "") {
      $("#otherFeesForSem4").css({ "border-color": " black" });
      otherFeesForSem4Status = true;
    } else {
      $("#otherFeesForSem4").css({ "border-color": "red" });
      otherFeesForSem4Status = false;
    }
    //Other Fees Sem4
    if ($("#otherFeesForSem5").val() != "") {
      $("#otherFeesForSem5").css({ "border-color": " black" });
      otherFeesForSem5Status = true;
    } else {
      $("#otherFeesForSem5").css({ "border-color": "red" });
      otherFeesForSem5Status = false;
    }
    //Other Fees Sem5
    if ($("#otherFeesForSem6").val() != "") {
      $("#otherFeesForSem6").css({ "border-color": " black" });
      otherFeesForSem6Status = true;
    } else {
      $("#otherFeesForSem6").css({ "border-color": "red" });
      otherFeesForSem6Status = false;
    }
    //Other Fees Sem5

    if (
      batchStatus &&
      departmentStatus &&
      semFeesStaus &&
      otherFeesForSem1Status &&
      otherFeesForSem2Status &&
      otherFeesForSem3Status &&
      otherFeesForSem4Status &&
      otherFeesForSem5Status &&
      otherFeesForSem6Status
    ) {
      swal("Are you sure you want to do this?", {
        buttons: ["cancel", true],
      }).then((data) => {
        if (data == true) {
          $(".spinner-border").css({ display: "inline-block" });
          $(".btnText").css({ display: "none" });
          $.ajax({
            type: "POST",
            url: "./php/addBatchFees.php",
            data: $("#frm").serialize(),
            success: (data) => {
              console.log(data);
              if (data == 1) {
                swal({
                  title: "Batch Fees Added",
                  icon: "success",
                  button: "ok",
                });
                $(".spinner-border").css({ display: "none" });
                $(".btnText").css({ display: "inline-block" });
                $("#frm")[0].reset();
              } else if (data == 0) {
                swal(
                  `Already batch fees added for this batch ${$(
                    "#batch"
                  ).val()}`,
                  " ",
                  "warning"
                );
                $(".spinner-border").css({ display: "none" });
                $(".btnText").css({ display: "inline-block" });
              } else swal("oops something went wrong :(", " ", "error");
            },
            error: (er) => {
              swal("oops something went wrong :(", " ", "error");
              $(".spinner-border").css({ display: "none" });
              $(".btnText").css({ display: "inline-block" });
            },
          });
        }
      }); //swal
    } else {
      swal("please fill all the fields", " ", "warning");
    }
  }); //btn
});
