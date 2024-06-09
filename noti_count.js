const unreadText = document.querySelector('.unread');

function noticount() {
    // Fetch the current status from the server
    fetch('count_notification.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Update the unread notification count
                if(data.count < 1){
                    unreadText.style.display = 'none';
                }else{
                    unreadText.style.display = '';
                    unreadText.textContent = data.count; // assuming 'count' is returned in data
                }
            } else {
                console.log("not success");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Optionally, display the error to the user
            unreadText.textContent = 'Error fetching notifications';
        });
}

// Call the function to update the notification count
setInterval(() => {
    noticount();
}, 1000);
