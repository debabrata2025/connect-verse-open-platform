// JavaScript code
bell_icon = document.querySelector('.bell_noti');

function showuserReq() {
    fetch('show_req.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                const requests = data.data;
                const notificationDiv = document.querySelector('.notification_div');
                notificationDiv.innerHTML = ''; // Clear existing notifications

                requests.forEach(request => {
                    const userDiv = document.createElement('div');
                    userDiv.className = 'main_noti_user';

                    userDiv.innerHTML = `
                        <div class="noti_user">
                            <div class="user_img_n">
                                <img src="${request.image}" alt="${request.name}">
                            </div>
                            <div class="user_name_n">
                                <span>${request.name}</span> sent you a<br>connect request
                            </div>
                        </div>
                        <div class="coti_confirm_div">
                            <div class="com_btn confirm" data-id="${request.id}">accept</div>
                            <div class="com_btn delete" data-id="${request.id}">cancel</div>
                        </div>
                    `;

                    // Add event listener to confirm button directly
                    const confirmBtn = userDiv.querySelector('.confirm');
                    confirmBtn.addEventListener('click', function() {
                        const requestId = this.getAttribute('data-id');
                        confirmRequest(requestId, userDiv); // Call AJAX function to confirm request
                    });

                    // Add event listener to confirm button directly
                    const cencelBtn = userDiv.querySelector('.delete');
                    cencelBtn.addEventListener('click', function() {
                        const requestId = this.getAttribute('data-id');
                        cencelRequest(requestId, userDiv); // Call AJAX function to cancel request
                    });

                    notificationDiv.appendChild(userDiv);
                });

                console.log("success");
            } else {
                console.log("not success");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            console.log("error occurs");
        });
}

function confirmRequest(requestId, userDiv) {
    fetch('confirm_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ requestId: requestId }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            console.log("Request confirmed successfully");
            // Hide the userDiv of the confirmed request
            userDiv.style.display = 'none';
        } else {
            console.log("Failed to confirm request");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        console.log("Error occurred while confirming request");
    });
}
function cencelRequest(requestId, userDiv) {
    fetch('cancel_request.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ requestId: requestId }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            console.log("Request canceled successfully");
            // Hide the userDiv of the confirmed request
            userDiv.style.display = 'none';
        } else {
            console.log("Failed to canceled request");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        console.log("Error occurred while canceled request");
    });
}

function removeNoticount(){
    fetch('removeNotiCount.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                console.log("Notification count removed successfully");
            } else {
                console.log("Failed to remove notification count");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            console.log("error occurs");
        });
}

bell_icon.addEventListener('click', function(){
    showuserReq();
    removeNoticount();
});
