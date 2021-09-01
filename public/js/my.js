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

    $('select').selectpicker();

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
            password: {
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
            password: {
                required: "Emp. Login Password is Required"
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
            if (element.attr("name") == "password") {
                $(".custome_errors9").html(error);
            }

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

});
console.log('hello');