document.addEventListener('DOMContentLoaded', function () {
    const connectBtn = document.querySelector('.sub_add_friend');
    const senderId = connectBtn.getAttribute('data-sender-id');
    const receiverId = connectBtn.getAttribute('data-receiver-id');

    const popup = document.querySelector('.alert_box1');
    const confirmBtn = document.getElementById('confirm-btn');
    const cancelBtn = document.getElementById('cancel-btn');


    // Function to show the popup
    function showPopup() {
        popup.style.display = 'block';
    }

    // Function to hide the popup
    function hidePopup() {
        popup.style.display = 'none';
    }

    // Fetch the current status from the server
    fetch(`fetch_friend_status.php?receiver_id=${receiverId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                if (data.status === 'pending') {
                    if (data.is_sender) {
                        document.getElementById('c_con_text').textContent = "Pending";
                    } else {
                        document.getElementById('c_con_text').textContent = "Requested";
                    }
                } else if (data.status === 'friend') {
                    document.getElementById('c_con_text').textContent = "Friend"; // Update text context to "Friend"
                } else {
                    document.getElementById('c_con_text').textContent = "Connect";
                }
            } else {
                document.getElementById('c_con_text').textContent = "Connect";
            }
        })
        .catch(error => console.error('Error:', error));

    // Add event listener to handle the friend request on click
    connectBtn.addEventListener('click', function () {
        if (document.getElementById('c_con_text').textContent === 'Friend') {
            showPopup();
        } else {
            let data = {
                senderId: senderId,
                receiverId: receiverId
            };

            fetch('friend_req.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json();
                })
                .then(result => {
                    if (result.success) {
                        if (result.status === 'friend') {
                            document.getElementById('c_con_text').textContent = "Friend"; // Update text context to "Friend"
                        } else if (result.status === 'pending') {
                            document.getElementById('c_con_text').textContent = "Pending";
                        } else {
                            document.getElementById('c_con_text').textContent = "connect";
                        }
                    } else {
                        console.log("request already sent");
                    }
                })
                .catch(error => console.error('Error:', error));
        }

    });


    // Add event listener for the confirm button in the popup
    confirmBtn.addEventListener('click', function() {
        hidePopup();
        // Handle unfriend logic here
        let data = {
            senderId: senderId,
            receiverId: receiverId
        };

        fetch('unfriend.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ' + response.statusText);
            }
            return response.json();
        })
        .then(result => {
            if (result.success) {
                document.getElementById('c_con_text').textContent = "Connect";
            } else {
                console.log("Error in unfriending");
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Add event listener for the cancel button in the popup
    cancelBtn.addEventListener('click', function() {
        hidePopup();
    });



});
