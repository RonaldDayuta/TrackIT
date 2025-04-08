$(document).ready(function() {
    // When the "Collect Data" button is clicked
    $("#collectData").click(function(event) {
        event.preventDefault(); // Prevents the page from reloading
        $("#content").load("collect_data.php"); // Loads collect_data.php into the content div
    });

    // When the "Review Data" button is clicked
    $("#reviewData").click(function(event) {
        event.preventDefault(); // Prevents the page from reloading
        $("#content").load("review_data.php"); // Loads review_data.php into the content div
    });

    // When the "Export Data" button is clicked and triggers download of the txt file
    $("#exportData").click(function(event) {
        event.preventDefault(); // Prevents the page from refreshing
        window.location.href = "export_data.php"; // Triggers an automatic download of the txt file
    });
});
