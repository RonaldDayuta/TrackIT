$(document).ready(function () {
    // Function to load data from the server and display it in the table
    function loadData() {
        $.ajax({
            url: '../php/fetch_data.php', // Adjust path as needed to fetch data
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                let rows = ''; // Initialize an empty string to hold table rows
                response.forEach(function (item) {
                    // Append each row of data to the table
                    rows += `
                        <tr>
                            <td>${item.user_id}</td>
                            <td>${item.loc}</td>
                            <td>${item.item_id}</td>
                            <td>${item.qty}</td>
                            <td>${item.dateT}</td>
                            <td>
                                <!-- Edit and Delete buttons for each row -->
                                <button class="btn btn-primary btn-sm edit-btn" data-id="${item.inventory_id}">Edit</button>
                                <button class="btn btn-danger btn-sm delete-btn" data-id="${item.inventory_id}">Delete</button>
                            </td>
                        </tr>
                    `;
                });
                $('#dataTable').html(rows); // Insert rows into the table
            },
            error: function () {
                alert('Error loading data'); // Alert if data load fails
            }
        });
    }

    loadData(); // Auto-load data when the page loads

    // Handle Edit Button click
    $(document).on("click", ".edit-btn", function () {
        let id = $(this).data("id"); // Get the id of the record to edit
    
        // Show confirmation prompt using SweetAlert
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to edit this record?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, edit it!",
            cancelButtonText: "No, cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                // Fetch existing data for the record to edit
                $.ajax({
                    url: "../php/fetch_single_data.php", // Endpoint to fetch single record data
                    method: "POST",
                    data: { id: id },
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            // Populate the form fields with the fetched data
                            $("#edit-inventory_id").val(response.data.inventory_id);
                            $("#edit-user_id").val(response.data.user_id);
                            $("#edit-loc").val(response.data.loc);
                            $("#edit-item_id").val(response.data.item_id);
                            $("#edit-qty").val(response.data.qty);
                            $("#edit-dateT").val(response.data.dateT);
                            // Show the edit modal
                            $("#editModal").modal("show");
                        } else {
                            // Show error if data fetching fails
                            Swal.fire("Error", response.message, "error");
                        }
                    },
                    error: function () {
                        // Handle error if AJAX request fails
                        Swal.fire("Error", "Failed to fetch data", "error");
                    },
                });
            }
        });
    });
    
    // Handle form submission for editing
    $("#editForm").on("submit", function (e) {
        e.preventDefault(); // Prevent default form submission
        
        $.ajax({
            url: "../php/edit_data.php", // Endpoint to submit edit data
            method: "POST",
            data: $("#editForm").serialize(), // Serialize the form data
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    // Show success message and refresh table
                    Swal.fire("Success", response.message, "success").then(() => {
                        $("#editModal").modal("hide"); // Hide the edit modal
                        loadData(); // Refresh the table with updated data
                    });
                } else {
                    // Show error if update fails
                    Swal.fire("Error", response.message, "error");
                }
            },
            error: function () {
                // Handle error if AJAX request fails
                Swal.fire("Error", "Failed to update record", "error");
            },
        });
    });
    
    // Handle Delete Button click
    $(document).on("click", ".delete-btn", function() {
        let id = $(this).data("id"); // Get the id of the record to delete
    
        // Show confirmation prompt using SweetAlert
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request to delete the record
                $.ajax({
                    url: "../php/delete_data.php", // Endpoint to delete data
                    method: "POST",
                    data: { id: id },
                    dataType: "json", // Ensure JSON response
                    success: function(response) {
                        console.log("🔵 Server Response:", response); // Log the server response for debugging
                        if (response.success) {
                            // Show success message and refresh table
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success"
                            });
                            loadData(); // Refresh table after deletion
                        } else {
                            // Show error message if deletion fails
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("❌ AJAX Error:", xhr.responseText); // Log AJAX error details
                        Swal.fire({
                            title: "AJAX Error!",
                            text: "Check console for details.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });    
});
