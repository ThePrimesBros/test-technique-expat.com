// main.js

function submitForm(event) {
    event.preventDefault();

    var form = $('#create-article-form');
    var url = form.attr('action');
    var data = form.serialize();

    $.ajax({
        type: 'POST',
        url: url,
        data: data,
        success: function(response) {
            // Redirect the user based on the response
            if (response.categoryId) {
                window.location.href = '/category/' + response.categoryId;
            } else {
                window.location.href = '/articles';
            }
        },
        error: function(xhr) {
            // Handle form validation errors
            var errors = xhr.responseJSON.errors;
            var errorMessage = '';
            for (var key in errors) {
                if (errors.hasOwnProperty(key)) {
                    errorMessage += errors[key] + '<br>';
                }
            }

            $('#error-message').html(errorMessage);
        }
    });
}
