$(document).ready(function() {

    var count = 2;

    $('.selectname').select2();

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
        // console.log("hey ankit");

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



        var cid = $("#city_id").val();

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
                    // console.log(index + " : "+item['city_name'] + " " + item['id']);
                });

                $("#select_cities2").html(sel_city).selectpicker('refresh');
                $("#select_cities2").val(cid).selectpicker('refresh');

            }
        });
    }


    // -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- - view attendence-----------------------------------




    $('.selectname').on('change', function() {
        var id = $(this).val();
        console.log(id);

        $.ajax({
            type: 'POST',
            url: 'http://localhost/hrms/employee/viewattendenceajax',

            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },
            data: { id: id },
            success: function(response) {
                // console.log(response);
                // var sel_city = " <select name='selectcity' class='selectpicker'><option value=''>Select City</option > ";
                var attendence_det = `<table class='table table-striped'>
                    <thead class="text-center">
                        <tr>
                            
                            <th scope='col'>Date</th>
                            <th scope='col'>status</th>
                            <th scope='col'>Punch in</th>
                            <th scope='col'>Punch_out</th>
                            <th scope='col'>Designation</th>
                        </tr>
                    </thead>
                    <tbody class="text-center"> `;
                response.forEach(function(item, index) {

                    attendence_det += "<tr style='text-align:left;'><td>" + item['date'] + "</td><td>" + item['status'] + "</td><td>" + item['punch_in'] + "</td><td>" + item['punch_out'] + "</td><td>" + item['designation_name'] + "</td></tr>";

                });

                attendence_det += '</tbody></table>';
                $(".attendence_table").html(attendence_det);

            }
        });



    });



    // -- -- -- -- -- -- -- -- -- -- -- -- -- --viewattendence end-----------------------------------------------------

    $(".add_new_punch").click(function() {

        var new_punch = ` <div class="row" style="padding: 10px; margin-top: -20px;" >                
                            <form action="">
                            <input type="hidden" id="present_emp_id">
                            <div class="col-md-6">
                            <input type="time" id="intime" style="" name="last_name" class="form-control time-picker intime" placeholder="In Time" value="">            
                            </div>
                            <div class="col-md-6" style="margin-left:-20px; position:relative;">
                            <input type="time" id="outtime" style="" name="last_name" class="form-control time-picker outtime" placeholder="Out Time" value="">
                            </div>   
                            <div style="position:absolute;margin-top:5px; margin-left: 186px;" class="remove_new_punch " id="remove_new_punch1"><i class="fa fa-minus-circle" style="font-size: 22px; color:red;"></i></div>


                            </div>`;


        $(this).parents(".col-sm-3").find(".punching_time").append(new_punch).slideDown("slow");

    });



    $(".present").click(function() {
        $(this).parents(".col-sm-3").find(".punching_time").slideToggle("slow");

        $(this).parents(".col-sm-3").find(".present").css('background-color', 'yellow');

        $(this).parents(".col-sm-3").find('.done_punch').attr('data', 1);

        console.log($(this).parents(".col-sm-3").find('.done_punch').attr('data', 1));


    });

    $(".done_punch").click(function() {
        $(this).parents(".col-sm-3").find(".punching_time").slideToggle("slow").html();
        // $(this).parents(".col-sm-3").find(".done").text("Done");

        console.log("Data Attribute Id : " + $(this).parents(".col-sm-3").find('.done_punch').attr('data'));

        var dates = $(this).parents(".col-sm-3").find("#hiddenDate").val();
        var emp_id = $(this).parents(".col-sm-3").find("#present_emp_id").val();
        var statusOfAtteendence = $(this).parents(".col-sm-3").find('.done_punch').attr('data');
        var in_time = new Array();
        var out_time = new Array();


        $(this).parents(".col-sm-3").find(".intime").each(function(index, item) {
            console.log($(item).val());
            in_time[index] = $(item).val();
        });
        $(this).parents(".col-sm-3").find(".outtime").each(function(index, item) {
            console.log($(item).val());
            out_time[index] = $(item).val();
        });

        var in_out = [in_time, out_time];
        //  var in_out = {
        //        "intime": in_time,
        //        "outtime": out_time
        //     };

        //  var arr = { "Company Name": ‘Flexiple’, "ID": 123}; 

        console.log("array In time : " + in_time);
        console.log("array Out Time : " + out_time);

        if ($(this).parents(".col-sm-3").find('.done_punch').attr('data') == 1) { // using if employee is present
            $(this).parents(".col-sm-3").find(".pha_status").show();
            $(this).parents(".col-sm-3").find(".pha_button").hide();
            console.log($(this).parents(".col-sm-3").find('.present').attr('data'));

            $.ajax({
                type: 'POST',
                url: 'http://localhost/hrms/employee/attendenceAjax',

                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },

                data: {
                    dates: dates,
                    emp_id: emp_id,
                    statusOfAtteendence: statusOfAtteendence,
                    in_out: in_out


                },
                success: function(response) {
                    console.log(response);

                }
            });


        } else if ($(this).parents(".col-sm-3").find('.done_punch').attr('data') == 2) { // using if employee is present but for half day only    
            var st = `<span style="font-size:17px; color:white;position: absolute; left: 50px; top: 11px;"><b>HALF DAY</b></span>`;
            $(this).parents(".col-sm-3").find(".pha_button").hide();
            $(this).parents(".col-sm-3").find(".pha_status").html(st).show();
            $(this).parents(".col-sm-3").find(".pha_status").css('background-color', '#1f91f3');

            console.log($(this).parents(".col-sm-3").find('.halfday').attr('data'));

            $.ajax({
                type: 'POST',
                url: 'http://localhost/hrms/employee/attendenceAjax',

                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content') },

                data: {
                    dates: dates,
                    emp_id: emp_id,
                    statusOfAtteendence: statusOfAtteendence,
                    in_time: in_time,
                    out_time: out_time,
                },
                success: function(response) {
                    console.log("hey : " + response);

                }
            });

        } else {

        }



    });




    $(".halfday").click(function() {
        $(this).parents(".col-sm-3").find(".punching_time").slideToggle("slow");
        console.log($(this).parents(".col-sm-3").find("#hiddenDate").val());
        console.log($(this).parents(".col-sm-3").find("#present_emp_id").val());



        $(this).parents(".col-sm-3").find('.done_punch').attr('data', 2);

        //  var in_time = new Array();
        //  var out_time = new Array();


        // $(this).parents(".col-sm-3").find(".intime").each(function(index,item){
        //       console.log($(item).val());
        //       in_time[index] = $(item).val();
        //  });
        // $(this).parents(".col-sm-3").find(".outtime").each(function(index,item){
        //         console.log($(item).val());
        //         out_time[index] = $(item).val();
        // });

        // console.log("array In time : "+ in_time);
        // console.log("array Out Time : "+ out_time);

    });
    $(".absent").click(function() { //  // using if employee is absent    

        // $(this).parents(".col-sm-3").find(".absent").text("Done");


        $(this).parents(".col-sm-3").find('.done_punch').attr('data', 0);
        if ($(this).parents(".col-sm-3").find('.done_punch').attr('data') == 0) {
            var st = `<span style="font-size:17px; color:white;position: absolute; left: 50px; top: 11px;"><b>ABSENT</b></span>`;
            $(this).parents(".col-sm-3").find(".pha_button").hide();
            $(this).parents(".col-sm-3").find(".pha_status").html(st).show();
            $(this).parents(".col-sm-3").find(".pha_status").css('background-color', '#fb483a');
        }
        $(this).parents(".col-sm-3").find(".punching_time").slideUp("slow").html();

    });

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

});

console.log('hello');