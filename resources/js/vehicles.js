
$(document).ready(function () {
    jQuery.validator.addMethod("vehicleNo", function (value, element) {
        return this.optional(element) || /^[A-Z]{2}[ -]?[0-9]{2}[ -]?[A-Z]{1,2}[ -]?[0-9]{4}$/.test(value);
    }, "Please enter valid vehicle number");

    jQuery.validator.addMethod("modelName", function (value, element) {
        return this.optional(element) || /^[a-zA-Z]+$/.test(value);
    }, "Please enter valid vehicle model number");
    $("#vehicleAdd").validate({

        rules: {
            model_name: {
            required: true,
            modelName: true

            },
            passenger_capacity: {
                required: true,
                number: true
            },
            vehicle_no: {
                required: true,
                vehicleNo:true
            },
            image: {
                required: true
            }
        },
        messages: {
            model_name: {
                required: "Please enter the model name"
            },
            passenger_capacity: {
                required: "Please enter passenger capacity",
                number: "Please enter a valid number"
            },
            vehicle_no: {
                required: "Please enter the vehicle number"
            },
            image: {
                required: "Please select an image"
            }
        },
        errorPlacement: function (error, element) {
            if (element.hasClass("model_name")) {
                error.appendTo(".modelNameError");
            }
            if (element.hasClass("passenger_capacity")) {
                error.appendTo(".passengerCapacityError");
            }
            if (element.hasClass("vehicle_no")) {
                error.appendTo(".vehicleNoError");
            }
            if (element.hasClass("image")) {
                error.appendTo(".imageError");
            }
        },

    });
    $.validator.addMethod("lettersOnly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "Please enter only letters in the name field.");
});

