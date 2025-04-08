$(document).ready(function () {
    console.log("🔵 jQuery Loaded - Ready!"); // Debugging: Confirms that jQuery is loaded

    // When the form with ID "collectForm" is submitted
    $("#collectForm").submit(function (event) {
        event.preventDefault(); // Prevents page reload on form submission
        console.log("🟢 Form Submitted!"); // Debugging: Confirms form submission

        // Show confirmation dialog using SweetAlert
        Swal.fire({
            title: "Are you sure?", // Dialog title
            text: "Do you want to save this data?", // Dialog message
            icon: "question", // Icon for the dialog
            showCancelButton: true, // Shows a cancel button
            confirmButtonText: "Yes, save it!", // Text for the confirm button
            cancelButtonText: "Cancel" // Text for the cancel button
        }).then((result) => {
            console.log("🟡 Swal Response:", result); // Debugging: Logs SweetAlert response

            // If the user confirms the action
            if (result.isConfirmed) {
                console.log("🟠 User Confirmed! Sending AJAX..."); // Debugging: Logs user confirmation

                // AJAX request to save data
                $.ajax({
                    url: "../php/save_data.php", // The PHP file that handles the data saving
                    type: "POST", // The HTTP method to use
                    data: $("#collectForm").serialize(), // Serialize the form data
                    dataType: "json", // Expect a JSON response from the server
                    success: function (response) {
                        console.log("✅ AJAX Response:", response); // Debugging: Logs server response

                        // If the data was successfully saved
                        if (response.success) {
                            Swal.fire("Saved!", response.message, "success"); // Success message
                            $("#collectForm")[0].reset(); // Reset the form after success
                        } else {
                            Swal.fire("Error!", response.message, "error"); // Error message
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log("❌ AJAX Error:", xhr.responseText); // Debugging: Logs any AJAX errors
                        Swal.fire("Request Failed", "Check console for errors", "error"); // Error message for request failure
                    }
                });
            }
        });
    });
});

// Function to limit the input value to 4 digits
function validateQuantity(input) {
    if (input.value.length > 4) {
        input.value = input.value.slice(0, 4); // Limits input to 4 digits
    }
}
