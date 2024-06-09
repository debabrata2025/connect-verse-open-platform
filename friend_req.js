document.addEventListener('DOMContentLoaded', function() {
    const connectBtn = document.querySelector('.sub_add_friend');
    const senderId = connectBtn.getAttribute('data-sender-id');
    const receiverId = connectBtn.getAttribute('data-receiver-id');

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
    connectBtn.addEventListener('click', function() {
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
                } else if(result.status === 'pending'){
                    document.getElementById('c_con_text').textContent = "Pending";
                }else{
                    document.getElementById('c_con_text').textContent = "connect";
                }
            } else {
                console.log("request already sent");
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
