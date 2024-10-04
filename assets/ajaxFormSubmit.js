$(document).ready(function(){
    // Capture form submit event
    $('.userContactForm, .contactAll').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submit
        
        // Create a FormData object
        var formData = $(this).serialize(); // Or use new FormData(this) for file uploads
        $('.successMessage').empty();
        $('.errorMessage').empty();
        
        $.ajax({
            url: 'process_form.php',  // PHP script that will process the form
            type: 'POST',
            data: formData,
            success: function(response) {
                // Handle success, e.g., show a success message
                $('.successMessage').text("Email Sent..");
                $('.successMessage').append(formData);d
                console.log(response); // Log the server response
            },
            error: function(xhr, status, error) {
                // Handle error
                $('.errorMessage').text("Email submission failed!");
                $('.successMessage').append(formData);
                console.log(xhr.responseText);
            }
        });
    });
});