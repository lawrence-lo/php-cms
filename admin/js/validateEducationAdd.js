window.onload = function () {
    "use strict";

    // Get elements
    var formHandle = document.forms[0];
    var errorMessages = document.querySelector("#error-messages");
    var errors;
    var message;

    formHandle.onsubmit = function () {

        errors = 0;
        errorMessages.innerHTML = "";
        message = "";

        // Get fields
        var type = formHandle.type;
        var subject = formHandle.subject;
        var school = formHandle.school;
        var date = formHandle.date;

        // Validate type
        if (type.value === "" || type.value === null) {
            message += "<li>Invalid Type.</li>";
            errors++;
        }

        // Validate subject
        if (subject.value === "" || subject.value === null) {
            message += "<li>Invalid Subject.</li>";
            errors++;
        }

        // Validate school
        if (school.value === "" || school.value === null) {
            message += "<li>Invalid School.</li>";
            errors++;
        }

        // Validate date
        if (date.value === "" || date.value === null) {
            message += "<li>Invalid Date.</li>";
            errors++;
        }

        if ( errors > 0 ) {
            // Show error messages
            errorMessages.innerHTML = "<ul>" + message + "</ul>";

            // Prevent submission
            return false;
        }
    };
};
