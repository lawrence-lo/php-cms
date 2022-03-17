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
        var title = formHandle.title;
        var content = formHandle.content;
        var url = formHandle.url;
        var date = formHandle.date;
        var type = formHandle.type;

        // Validate title
        if (title.value === "" || title.value === null) {
            message += "<li>Invalid Title.</li>";
            errors++;
        }

        // Validate content
        if (content.value === "" || content.value === null) {
            message += "<li>Invalid Content.</li>";
            errors++;
        }

        // Validate date
        if (date.value === "" || date.value === null) {
            message += "<li>Invalid Date.</li>";
            errors++;
        }

        // Validate type
        if (type.value === "" || type.value === null) {
            message += "<li>Invalid Type.</li>";
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
