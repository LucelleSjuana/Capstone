function updateStatus(id, status) {
    $.ajax({
        type: 'POST',
        url: 'update_status.php', // Create this file to handle the update
        data: { id: id, status: status },
        success: function(response) {
            alert(response); // Display the response message (you can customize this part)
        },
        error: function(error) {
            alert('Error updating status.'); // Display an error message if the update fails
        }
    });
}