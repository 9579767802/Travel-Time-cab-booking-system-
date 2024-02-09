$(document).ready(function () {
    jQuery.validator.addMethod("license", function (value, element) {
        return this.optional(element) || /^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/.test(value);
    }, "Please enter valid license number");
    jQuery.validator.addMethod("aadhar", function (value, element) {
        return this.optional(element) || /^[2-9]{1}[0-9]{11}$/.test(value);
    }, "Please enter valid aadhar number");

    $("#addDriver").validate({
        rules: {
            name: {
                required: true,
                lettersOnly: true
            },
            license_no: {
                required: true,
                license: true
            },
            aadhar_no: {
                required: true,
                aadhar: true
            },
            address: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Please enter your name",
                lettersOnly: "Name should only contain letters"
            },
            license_no: {
                required: "Please enter license no",
                pattern: "Enter valid license no",
            },
            aadhar_no: {
                required: "Please enter your Aadhar number",
                digits: "Please enter valid number"
            },
            address: {
                required: "Please enter your address"
            }
        },
        errorPlacement: function (error, element) {
            if (element.hasClass("name")) {
                error.appendTo(".nameError");
            }
            if (element.hasClass("license_no")) {
                error.appendTo(".licenseNoError");
            }
            if (element.hasClass("aadhar_no")) {
                error.appendTo(".aadharNoError");
            }
            if (element.hasClass("address")) {
                error.appendTo(".addressError");
            }
        },
    });
    $.validator.addMethod("lettersOnly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Please enter only letters in the name field.");

});
