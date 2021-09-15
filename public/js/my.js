$(document).ready(function() {

    var count = 2;

    $(".addField").click(function() {

        $(".fieldsWrap").append(

            `<div class="row">

                <div class="col-md-10"> 

                    <textarea class = "addnote_area" name="notes[]" id="addfield"` + count++ + `" cols="55" rows="2" ></textarea>

                </div>

                <div class="col-md-2"> 

                

                    <button class="rem" type="button" title="click to remove" style="margin:9px;border:none ;background-color:red;color:white;border-radius:4px">

                        <i class="fa fa-remove" style="font-size: 15px;color:white;padding:5px"></i>                    

                    </button>

                </div>

            </div>`

        );

    });

    $(".modal-content").on("click", ".rem", function() {

        // console.log($(this).parent().parent());

        $(this).parent().parent().remove();

    });



    $("#savenote").click(function() {

        console.log($(".fieldsWrap textarea"));

        var notesArray = [];

        $(".fieldsWrap textarea").each(function(index, item) {

            notesArray[index] = $(item).val();

        });

        const jsonString = JSON.stringify(Object.assign({}, notesArray));

        console.log(jsonString);



    });



    if ($('select').length > 0) {

        $('select').selectpicker();
    }



    $("#add_employee_form").validate({

        rules: {

            first_name: {

                required: true

            },

            dob: {

                required: true

            },

            gender: {

                required: true

            },

            // image: {

            //     image: true,

            //     extension: "jpeg|png|jpg|gif|svg"

            // },



            personal_email_address: {

                required: true,

                email: true,

            },



            mobile_number: {

                required: true

            },

            department: {

                required: true

            },

            designation: {

                required: true

            },

            joining_date: {

                required: true

            },

            // password: {

            //     required: true

            // },



        },

        messages: {

            first_name: {

                required: "First Name is required."

            },

            dob: {

                required: "Date of Birth is required."

            },

            gender: {

                required: "Gender is required."

            },

            // image: {

            //     image: "enter image in jpeg, png, bmp, gif, or svg format"

            // },

            personal_email_address: {

                required: "Personal Email Address is Required",

                email: "Enter Valid Email Address",



            },



            mobile_number: {

                required: "Mobile Number is Required"

            },

            department: {

                required: "Department is Required"

            },

            designation: {

                required: "Designation is Required"

            },

            joining_date: {

                required: "Joining Date is Required"

            },

            // password: {

            //     required: "Emp. Login Password is Required"

            // },

        },

        errorPlacement: function(error, element) {

            if (element.attr("name") == "first_name") {

                $(".custome_errors1").html(error);

            }

            if (element.attr("name") == "dob") {

                $(".custome_errors2").html(error);

            }

            if (element.attr("name") == "gender") {

                $(".custome_errors3").html(error);

            }

            // if (element.attr("name") == "image") {

            //     $(".custome_errors10").html(error);

            // }

            if (element.attr("name") == "personal_email_address") {

                $(".custome_errors4").html(error);

            }

            if (element.attr("name") == "mobile_number") {

                $(".custome_errors5").html(error);

            }

            if (element.attr("name") == "department") {

                $(".custome_errors6").html(error);

            }

            if (element.attr("name") == "designation") {

                $(".custome_errors7").html(error);

            }

            if (element.attr("name") == "joining_date") {

                $(".custome_errors8").html(error);

            }

            // if (element.attr("name") == "password") {

            //     $(".custome_errors9").html(error);

            // }



        },





        submitHandler: function() {

            return true;

        }

    });





    $("#edit_employee_form").validate({

        rules: {

            first_name: {

                required: true

            },

            dob: {

                required: true

            },

            gender: {

                required: true

            },

            // image: {

            //     image: true,

            //     extension: "jpeg|png|jpg|gif|svg"

            // },



            personal_email_address: {

                required: true,

                email: true,

            },



            mobile_number: {

                required: true

            },

            department: {

                required: true

            },

            designation: {

                required: true

            },

            joining_date: {

                required: true

            },





        },

        messages: {

            first_name: {

                required: "First Name is required."

            },

            dob: {

                required: "Date of Birth is required."

            },

            gender: {

                required: "Gender is required."

            },

            // image: {

            //     image: "enter image in jpeg, png, bmp, gif, or svg format"

            // },

            personal_email_address: {

                required: "Personal Email Address is Required",

                email: "Enter Valid Email Address",



            },



            mobile_number: {

                required: "Mobile Number is Required"

            },

            department: {

                required: "Department is Required"

            },

            designation: {

                required: "Designation is Required"

            },

            joining_date: {

                required: "Joining Date is Required"

            },



        },

        errorPlacement: function(error, element) {

            if (element.attr("name") == "first_name") {

                $(".custome_errors1").html(error);

            }

            if (element.attr("name") == "dob") {

                $(".custome_errors2").html(error);

            }

            if (element.attr("name") == "gender") {

                $(".custome_errors3").html(error);

            }

            // if (element.attr("name") == "image") {

            //     $(".custome_errors10").html(error);

            // }

            if (element.attr("name") == "personal_email_address") {

                $(".custome_errors4").html(error);

            }

            if (element.attr("name") == "mobile_number") {

                $(".custome_errors5").html(error);

            }

            if (element.attr("name") == "department") {

                $(".custome_errors6").html(error);

            }

            if (element.attr("name") == "designation") {

                $(".custome_errors7").html(error);

            }

            if (element.attr("name") == "joining_date") {

                $(".custome_errors8").html(error);

            }





        },





        submitHandler: function() {

            return true;

        }

    });




    $("#change_password_form").validate({

        rules: {

            currentpasssword: {

                required: true

            },

            newpassword: {

                required: true

            },

            confirmpassword: {

                required: true

            },



        },

        messages: {

            currentpasssword: {

                required: "Current Password is required."

            },

            newpassword: {

                required: "New Password required."

            },

            confirmpassword: {

                required: "Confirm Password is required."

            },





        },

        errorPlacement: function(error, element) {

            if (element.attr("name") == "currentpasssword") {

                $(".custome_errors1").html(error);

            }

            if (element.attr("name") == "newpassword") {

                $(".custome_errors2").html(error);

            }

            if (element.attr("name") == "confirmpassword") {

                $(".custome_errors3").html(error);

            }



        },





        submitHandler: function() {

            return true;

        }

    });


    $('#selectstate').on('change', function() {
        var state_code = $(this).val();
        console.log("hey ankit");

        $.ajax({
            type: 'POST',
            url: 'http://localhost/hrms/employee/ajax',

            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            data: { state_code: state_code },
            success: function(response) {

                var sel_city = " <select name='selectcity' class='selectpicker'><option value=''>Select City</option> ";
                response.forEach(function(item, index) {
                    console.log(index + " : " + item['city_name'] + " " + item['id']);
                    sel_city += "<option value=" + item['id'] + ">" + item['city_name'] + "</option>";
                });

                $("#select_cities").html(sel_city).selectpicker('refresh');

            }
        });



    });

    $('#selectstate2').on('change', function() {
        var state_code = $(this).val();
        // alert(state_code)

        $.ajax({
            type: 'POST',
            url: 'http://localhost/hrms/employee/ajax',

            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            data: { state_code: state_code },
            success: function(response) {

                var sel_city = " <select name='selectcity2' class='selectpicker'><option value=''>Select City</option> ";
                response.forEach(function(item, index) {
                    // console.log(index + " : "+item['city_name'] + " " + item['id']);
                    sel_city += "<option value=" + item['id'] + ">" + item['city_name'] + "</option>";
                });

                $("#select_cities2").html(sel_city).selectpicker('refresh');

            }
        });



    });

    if ($('#selectstate2').val() != "") {

        var id = $("#city_id").val();
        var state_code = ($('#selectstate2').val());
        $.ajax({
            type: 'POST',
            url: 'http://localhost/hrms/employee/ajax',

            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            data: { state_code: state_code },
            success: function(response) {

                var sel_city = " <select name='selectcity2' class='selectpicker'><option value=''>Select City</option> ";
                response.forEach(function(item, index) {
                    sel_city += "<option  value=" + item['id'] + ">" + item['city_name'] + "</option>";
                });

                $("#select_cities2").html(sel_city).selectpicker('refresh');
                $("#select_cities2").val(id).selectpicker('refresh');

            }
        });
    }




    // $('.present').on('change', function() {
    //        console.log($(this).val());
    // });

    $(".present").click(function() {
        $(this).parents(".col-sm-3").find(".punching_time").slideToggle("slow");
    });

    $(".add_new_punch").click(function() {
        //  console.log('hey arya');

        //  console.log( $(this).parents(".col-sm-3").find(".punching_time").html());

        var new_punch = ` <div class="row" style="padding: 10px; margin-top: -20px;" >                
                            <form action="">
                            <input type="hidden" id="present_emp_id">
                            <div class="col-md-6">
                            <input type="time" style="font-size: 10px;" name="last_name" class="form-control" placeholder="In Time" value="">            
                            </div>
                            <div class="col-md-6" style="margin-left:-20px; position:relative;">
                            <input type="time" style="font-size: 10px;" name="last_name" class="form-control" placeholder="Out Time" value="">
                            </div>   
                            <div style="position:absolute;margin-top:5px; margin-left: 186px;" class="remove_new_punch" id="remove_new_punch1"><i class="fa fa-minus-circle" style="font-size: 22px; color:red;"></i></div>


                            </div>`;


        $(this).parents(".col-sm-3").find(".punching_time").append(new_punch).slideDown("slow");

    });



    $(".done_punch").click(function() {
        $(this).parents(".col-sm-3").find(".punching_time").slideToggle("slow").html();
        $(this).parents(".col-sm-3").find(".done").text("Done");
    });

    $(".halfday").click(function() {

        $(this).parents(".col-sm-3").find(".punching_time").slideToggle("slow").html();
        // $(this).parents(".col-sm-3").find(".punching_time").children(".halfday").text("done");
        // $(this).parents(".col-sm-3").find(".halfday").text("Done");
    });
    //   $(".absent").click(function(){

    //         $(this).parents(".col-sm-3").find(".absent").text("Done");
    //   });

    $(document).on('click', '.remove_new_punch', function() {
        console.log('jiten');
        console.log($(this).parent().remove());
    });

    //$(".remove_new_punch").html();



    $("#show_pass").click(function() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    });



    $('#department').on('change', function() {
        var dept_id = $(this).val();
        // alert(dept_id);


        $.ajax({
            type: 'POST',
            url: 'http://localhost/hrms/employee/designationAjax',

            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            data: { dept_id: dept_id },
            success: function(response) {
                // console.log(response);

                var sel_desig = " <select name='designation' class='selectpicker'><option value=''>Select Designation</option> ";
                response.forEach(function(item, index) {
                    // console.log(item);
                    sel_desig += "<option value=" + item['id'] + ">" + item['designation_name'] + "</option>";
                });

                $("#designation").html(sel_desig).selectpicker('refresh');

            }
        });


    });



    $('#department2').on('change', function() {
        var dept_id = $(this).val();

        // alert("hey jiten" + dept_id);
        console.log("hello jit");
        // url: 'http://localhost/hrms/employee/designationAjax',

        $.ajax({
            type: 'POST',
            url: 'http://localhost/hrms/employee/designationAjax',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            data: { dept_id: dept_id },
            success: function(response) {
                // console.log(response);

                var sel_desig = " <select name='designation2' class='selectpicker'><option value=''>Select Designation</option> ";
                response.forEach(function(item, index) {
                    // console.log(item);
                    sel_desig += "<option value=" + item['id'] + ">" + item['designation_name'] + "</option>";
                });

                $("#designation2").html(sel_desig).selectpicker('refresh');

            }
        });



    });



    if ($('#department2').val() != "") {
        var id = $("#desig_id").val();
        var dept_id = ($('#department2').val());
        // console.log(dept_id);

        $.ajax({
            type: 'POST',
            url: 'http://localhost/hrms/employee/designationAjax',

            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            data: { dept_id: dept_id },
            success: function(response) {
                // console.log(response);

                var sel_desig = " <select name='designation2' class='selectpicker'><option value=''>Select Designation</option> ";
                response.forEach(function(item, index) {
                    // console.log(item);
                    sel_desig += "<option value=" + item['id'] + ">" + item['designation_name'] + "</option>";
                });

                $("#designation2").html(sel_desig).selectpicker('refresh');
                $("#designation2").val(id).selectpicker('refresh');

            }

        });




    }


    //--------------------------------------------------------------------------------
    // $('#input_starttime').pickatime({
    //     // 12 or 24 hour
    //     twelvehour: true,
    // });


});

console.log('hello');