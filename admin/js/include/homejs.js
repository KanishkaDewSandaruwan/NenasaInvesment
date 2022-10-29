addContactMessage = (form) => {
    var formData = new FormData(form);

    if (formData.get('name').trim() != '') {
        if (formData.get('email').trim() != '') {
            if (formData.get('subject').trim() != '') {
                if (formData.get('message').trim() != '') {
                    $.ajax({
                        method: "POST",
                        url: HOME_API_PATH + "addcontact",
                        data: formData,
                        success: function ($data) {
                            console.log($data);
                            successToast();
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (error) {
                            console.log(`Error ${error}`);
                        }
                    });
                } else { errorMessage("Please Enter Message"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter Email Address"); }
    } else { errorMessage("Please Enter Your Name"); }

}


addCompany = (form) => {
    let fd = new FormData(form);
    console.log(fd);

    if (fd.get('company_name').trim() != '') {
        if (fd.get('company_description').trim() != '') {
            if (fd.get('company_login_email').trim() != '') {
                if (fd.get('company_password').trim() != '') {
                    if (fd.get('company_admin_email').trim() != '') {
                        if (fd.get('company_admin_phone').trim() != '') {
                            if (fd.get('re_company_password').trim() != '') {
                                if (fd.get('company_password') == fd.get('re_company_password')) {
                                    if (emailvalidation(fd.get('company_login_email')) && emailvalidation(fd.get('company_admin_email'))) {
                                        if (phonenumber(fd.get('company_admin_phone'))) {

                                            $.ajax({
                                                method: "POST",
                                                url: HOME_API_PATH + "addCompany",
                                                data: fd,
                                                success: function ($data) {
                                                    console.log($data);
                                                    if ($data > 0) {
                                                        errorMessage("Your Company Already Registerd!");
                                                    } else {
                                                        successToast();
                                                    }
                                                },
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                error: function (error) {
                                                    console.log(`Error ${error}`);
                                                }
                                            });
                                        } else { errorMessage("Phone Number is not valid"); }
                                    }
                                }
                            } else { errorMessage("Pleasefill required Details"); }
                        } else { errorMessage("Please fill required Details"); }
                    } else { errorMessage("Please fill required Details"); }
                } else { errorMessage("Pleasefill required Details"); }
            } else { errorMessage("Please fill required Details"); }
        } else { errorMessage("Please fill required Details"); }
    } else { errorMessage("Please fill required Details"); }


}

addJob = (form) => {
    var formData = new FormData(form);

    if (formData.get('company_id') != 0) {
        if (formData.get('job_title').trim() != '') {
            if (formData.get('job_location').trim() != '') {
                if (formData.get('job_description').trim() != '') {
                    $.ajax({
                        method: "POST",
                        url: HOME_API_PATH + "addJob",
                        data: formData,
                        success: function ($data) {
                            console.log($data);
                            if ($data > 0) {
                                errorMessage("This Job is Already Here.. ! Please Select Other Time")
                            } else {
                                successToast();
                            }
                        },
                        cache: false,
                        contentType: false,
                        processData: false,
                        error: function (error) {
                            console.log(`Error ${error}`);
                        }
                    });
                } else { errorMessage("Please Enter Description"); }
            } else { errorMessage("Please enter Job Location"); }
        } else { errorMessage("Please Enter Title"); }
    }

}


applyJob = (form) => {
    var formData = new FormData(form);


    if (formData.get('additional_details').trim() != '') {
        if (formData.get('file') != '') {

            $.ajax({
                method: "POST",
                url: HOME_API_PATH + "applyJob",
                data: formData,
                success: function ($data) {
                    console.log($data);
                    if ($data > 0) {
                        errorMessage("You Already Applied this Job")
                    } else {
                        successToastRedirect("joblist.php");
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });

        } else { errorMessage("Please Upload Image"); }
    } else { errorMessage("Please Enter Additional Details"); }


}


//profile changers

changeEmail = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_email').trim() != '') {
        if (formData.get('new_email').trim() != '') {
            if (checkEmail(formData.get('current_email'), formData.get('customer_id')) > 0) {

                var data = {
                    id: formData.get('customer_id'),
                    field: 'email',
                    value: formData.get('new_email'),
                    id_fild: 'customer_id',
                    table: 'customer',
                }

                $.ajax({
                    method: "POST",
                    url: HOME_API_PATH + "updateData",
                    data: data,
                    success: function ($data) {
                        console.log($data);
                        successToastwithLogout();
                    },
                    error: function (error) {
                        console.log(`Error ${error}`);
                    }
                });

            } else { errorMessage("Current Emaiil is Wrong!"); }
        } else { errorMessage("Please Enter Email Address"); }
    } else { errorMessage("Please Enter Your Name"); }

}

changeHomeDescription = (form) => {
    let fd = new FormData(form);

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "changeDescription",
        data: fd,
        success: function ($data) {
            console.log($data);
            loading("Company Description Saving Success..")
            
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

}

changePassword = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_password').trim() != '') {
        if (formData.get('new_password').trim() != '') {
            if (formData.get('confirm_new_password').trim() != '') {
                if (formData.get('new_password') === formData.get('confirm_new_password')) {
                    if (checkPassword(formData.get('current_password'), formData.get('customer_id')) > 0) {

                        var data = {
                            id: formData.get('customer_id'),
                            field: 'password',
                            value: formData.get('new_password'),
                            id_fild: 'customer_id',
                            table: 'customer',
                        }

                        $.ajax({
                            method: "POST",
                            url: HOME_API_PATH + "updateData",
                            data: data,
                            success: function ($data) {
                                console.log($data);
                                successToastwithLogout();
                            },
                            error: function (error) {
                                console.log(`Error ${error}`);
                            }
                        });

                    } else { errorMessage("Current Password is Wrong"); }
                } else { errorMessage("Password is Not Match!"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter New Password"); }
    } else { errorMessage("Please Enter Current Password"); }

}


changePasswordCompany = (form) => {
    var formData = new FormData(form);

    if (formData.get('current_password').trim() != '') {
        if (formData.get('new_password').trim() != '') {
            if (formData.get('confirm_new_password').trim() != '') {
                if (formData.get('new_password') === formData.get('confirm_new_password')) {
                    if (checkPasswordCompany(formData.get('current_password'), formData.get('company_id')) > 0) {

                        var data = {
                            id: formData.get('company_id'),
                            field: 'company_password',
                            value: formData.get('new_password'),
                            id_fild: 'company_id',
                            table: 'company',
                        }

                        $.ajax({
                            method: "POST",
                            url: HOME_API_PATH + "updateData",
                            data: data,
                            success: function ($data) {
                                console.log($data);
                                successToastwithLogout();
                            },
                            error: function (error) {
                                console.log(`Error ${error}`);
                            }
                        });

                    } else { errorMessage("Current Password is Wrong"); }
                } else { errorMessage("Password is Not Match!"); }
            } else { errorMessage("Please Enter Phone Number"); }
        } else { errorMessage("Please Enter New Password"); }
    } else { errorMessage("Please Enter Current Password"); }

}

checkPassword = (password, customer_id) => {
    const data = {
        password: password,
        customer_id: customer_id,
    }
    var values;
    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "checkPassword",
        data: data,
        async: false,
        success: function (data) {
            values = data;
            console.log(data);
        },

        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
    return values;
}

checkPasswordCompany = (company_password, company_id) => {
    const data = {
        company_password: company_password,
        company_id: company_id,
    }
    var values;
    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "checkPasswordCompany",
        data: data,
        async: false,
        success: function (data) {
            values = data;
            console.log(data);
        },

        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
    return values;
}

function checkEmail(email, customer_id) {
    const data = {
        email: email,
        customer_id: customer_id,
    }
    var values;

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "checkEmail",
        data: data,
        async: false,
        success: function (data) {
            console.log(data);
            values = data;

        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });

    return values;
}


updateDataFromHome = (ele, id, field, table, id_fild) => {

    var itemid = ele.id;
    var val = document.getElementById(ele.id).value;

    var data = {
        id_fild: id_fild,
        id: id,
        field: field,
        value: val,
        table: table,
    }

    if (field == 'email') {
        if (emailvalidation(val)) {
            callUpdateRequestFromHome(data);
        }

    } else if (field == 'phone') {
        if (phonenumber(val)) {
            callUpdateRequestFromHome(data);
        }
    } else {
        callUpdateRequestFromHome(data);
    }

}

updateStatusFromHome = (value, id, field, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Cancel it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id_fild: id_fild,
                id: id,
                field: field,
                value: value,
                table: table,
            }


            callUpdateRequestFromHome(data);

            Swal.fire(
                'Canceled!',
                'Your file has been Canceled.',
                'success'
            )
        }
    })
}

deleteDataFromHome = (id, table, id_fild) => {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            var data = {
                id: id,
                table: table,
                id_fild: id_fild,
            }

            console.log(data);

            $.ajax({
                method: "POST",
                url: HOME_API_PATH + "deleteData",
                data: data,
                success: function ($data) {
                    console.log($data);
                    successToastwithLogout();
                },
                error: function (error) {
                    console.log(`Error ${error}`);
                }
            });
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
}

callUpdateRequestFromHome = (data) => {

    $.ajax({
        method: "POST",
        url: HOME_API_PATH + "updateData",
        data: data,
        success: function ($data) {
            console.log($data);
            successToast();
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}


search = (form) => {
    console.log("clicked");
    var formData = new FormData(form);
    var keyword = formData.get('key');
    window.location.href = "job-listings.php?key=" + keyword;
}