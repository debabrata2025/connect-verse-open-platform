// Get all elements with the class 'sb_btn'
const publishbtn = document.querySelectorAll('.sb_btn');

// Function to get current time in seconds since the Unix epoch
function getCurrentTimeInSeconds() {
    return Math.floor(Date.now() / 1000);
}

// Add click event listener to the second publish button
publishbtn[1].addEventListener('click', () => {
    const inputFile = document.getElementById('story_id');
    const file = inputFile.files[0];

    if (!file) {
        alert("Please select a file to upload.");
        return;
    }

    const currentTimeInSeconds = getCurrentTimeInSeconds();
    const formData = new FormData();
    formData.append('story_image', file);
    formData.append('current_time', currentTimeInSeconds); // Add current time in seconds to form data

    fetch('story.php', {
        method: 'POST',
        body: formData // FormData automatically sets the Content-Type header
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Image upload failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while uploading the image.');
    });
});

// Add current time to the form data for deletion of expired stories
const formDataForDelete = new FormData();
formDataForDelete.append('current_time', getCurrentTimeInSeconds());

fetch('delete_expired_stories.php', {
    method: 'POST',
    body: formDataForDelete // FormData automatically sets the Content-Type header
})
.then(response => response.json())
.then(data => {
    console.log(data.message);
})
.catch(error => {
    console.error('Error:', error);
});
