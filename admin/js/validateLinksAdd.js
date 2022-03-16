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
        var name = formHandle.name;
        var url = formHandle.url;

        // Validate name
        if (name.value === "" || name.value === null) {
            message += "<li>Invalid Name.</li>";
            errors++;
        }

        // Validate url
        if (url.value === "" || url.value === null) {
            message += "<li>Invalid URL.</li>";
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
