document.addEventListener('DOMContentLoaded', function () {
    const connectBtn = document.querySelectorAll('.sub_add_friend');
    const senderId = connectBtn[2].getAttribute('data-sender-id');
    const receiverId = connectBtn[2].getAttribute('data-receiver-id');
    const textMsg = document.querySelectorAll('.c_con_text');

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
                        textMsg[2].textContent = "Pending";
                    } else {
                        textMsg[2].textContent = "Requested";
                    }
                } else if (data.status === 'friend') {
                    textMsg[2].textContent = "Friend"; // Update text context to "Friend"
                } else {
                    textMsg[2].textContent = "Connect";
                }
            } else {
                textMsg[2].textContent = "Connect";
            }
        })
        .catch(error => console.error('Error:', error));

    // Add event listener to handle the friend request on click
    connectBtn[2].addEventListener('click', function () {
        if (textMsg[2].textContent === 'Friend') {
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
                            textMsg[2].textContent = "Friend"; // Update text context to "Friend"
                        } else if (result.status === 'pending') {
                            textMsg[2].textContent = "Pending";
                        } else {
                            textMsg[2].textContent = "connect";
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
                textMsg[2].textContent = "Connect";
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
