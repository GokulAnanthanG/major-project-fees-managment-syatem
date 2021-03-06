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

  $(".addButton").click(() => {
    var regNoStatus = false,
      rollNoStatus = false,
      nameStatus = false,
      batchStatus = false,
      departmentStatus = false,
      vanOrBusFeesStatus = false,
      genderStatus = false,
      skillStatus = false;
    if ($("#regNo").val() != "") {
      $("#regNo").css({ "border-color": " black" });
      regNoStatus = true;
    } else {
      $("#regNo").css({ "border-color": "red" });
      regNoStatus = false;
    }
    //regNo
    if ($("#rollNo").val() != "") {
      $("#rollNo").css({ "border-color": " black" });
      rollNoStatus = true;
    } else {
      $("#rollNo").css({ "border-color": "red" });
      rollNoStatus = false;
    }
    //rollNo

    if ($("#name").val() != "") {
      $("#name").css({ "border-color": " black" });
      nameStatus = true;
    } else {
      $("#name").css({ "border-color": "red" });
      nameStatus = false;
    }
    //name
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
    if ($("#vanOrBusFees").val() != "") {
      $("#vanOrBusFees").css({ "border-color": " black" });
      vanOrBusFeesStatus = true;
    } else {
      $("#vanOrBusFees").css({ "border-color": "red" });
      vanOrBusFeesStatus = false;
    }
    //vanOrBusFees
    if ($("#gender").val() != "") {
      $("#gender").css({ "border-color": " black" });
      genderStatus = true;
    } else {
      $("#gender").css({ "border-color": "red" });
      genderStatus = false;
    }
    //gender
    if ($("#skill").val() != "") {
      $("#skill").css({ "border-color": " black" });
      skillStatus = true;
    } else {
      $("#skill").css({ "border-color": "red" });
      skillStatus = false;
    }
    //gender
    //condition
    if (String(fileNameChosed).length == 0) {
      if (
        regNoStatus &&
        rollNoStatus &&
        nameStatus &&
        batchStatus &&
        departmentStatus &&
        vanOrBusFeesStatus &&
        genderStatus &&
        skillStatus
      ) {
        swal("Are you sure you want to do this?", {
          buttons: ["cancel", true],
        }).then((data) => {
          if (data) {
            $(".spinner-border").css({ display: "inline-block" });
            $(".btnText").css({ display: "none" });
            $.ajax({
              type: "POST",
              url: "./php/addStudent.php",
              data: $("#frm").serialize(),
              success: (data) => {
                console.log(data);
                if (data == 1) {
                  swal({
                    title: "student added",
                    icon: "success",
                    button: "ok",
                  });
                  $(".spinner-border").css({ display: "none" });
                  $(".btnText").css({ display: "inline-block" });
                  $("#frm")[0].reset();
                } else {
                  $(".spinner-border").css({ display: "none" });
                  $(".btnText").css({ display: "inline-block" });
                  swal("oops something went wrong :(", " ", "error");
                }
              },
              error: (err) => {
                console.log(err);
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
    } //if
    else {
      swal("Are you sure you want to do this?", {
        buttons: ["cancel", true],
      }).then((data) => {
        if (data == true) {
          $(".spinner-border").css({ display: "inline-block" });
          $(".btnText").css({ display: "none" });
          var formdata = new FormData();
          formdata.append("file", FileExcelFile);
          formdata.append("fileStatus", true);
          $.ajax({
            method: "post",
            url: "./php/addStudentThroughExcel.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: (data) => {
              if (data == 1) {
                $(".spinner-border").css({ display: "none" });
                $(".btnText").css({ display: "inline-block" });
                fileNameChosed = " ";
                FileExcelFile = " ";
                swal({
                  title: "students added",
                  icon: "success",
                  button: "ok",
                });
              } else {
                $(".spinner-border").css({ display: "none" });
                $(".btnText").css({ display: "inline-block" });
                swal(
                  "oops something went wrong :( failed to add the students",
                  " ",
                  "error"
                );
              }
            },
            error: (err) => {
              swal("oops something went wrong", " ", "error");
            },
          }); //ajax
        }
      }); //promise
    } //else
  }); //button

  //getSkills
  $("#batch").keyup(function () {
    $("#skill").html("<option value=''>--</option>");
    $.ajax({
      method: "POST",
      url: "./php/getSkillToAddStudent.php",
      data: { batch: $("#batch").val() },
      success: (data) => {
        console.log(JSON.parse(data));
        if (data != 0) {
          $("#skillInfo").html(" ");
          let parsedData = JSON.parse(data);
          parsedData.forEach((e, i) => {
            console.log(i);
            if (i % 2 == 0) {
              $("#skill").append(
                `<option value='${e.value}'>${e.value}</option>`
              );
            }
          });
        } else if (data == 0) {
          $("#skillInfo").html("no skills added for this batch");
        }
      },
      error: (err) => {
        console.log(err);
        swal(
          "oops something went wrong :( failed to fetch skills",
          " ",
          "error"
        );
      },
    });
  });
  //file change
  var fileNameChosed = "";
  var FileExcelFile;
  $("#importData").change((e) => {
    fileNameChosed = "";
    $("#fileName").html("");
    FileExcelFile = $("#importData")[0].files[0];
    fileNameChosed = $("#importData")[0].files[0].name;
    $("#fileName").html(fileNameChosed);
    $("#importData")[0].files[0];
  }); //file change
});
