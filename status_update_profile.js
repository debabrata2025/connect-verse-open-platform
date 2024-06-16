document.addEventListener("DOMContentLoaded", function () {
    const allFriends = document.querySelectorAll('.all_friend1');
    const connectBtn = document.querySelectorAll('.sub_add_friend');
    const displayPopup = document.querySelector('.friends_overlay1');
    const cancel_btn = document.querySelector('.can_btn1');

    //hide and display pop-up
    connectBtn[0].addEventListener('click', () => {
        displayPopup.classList.add('active');
    })

    cancel_btn.addEventListener('click', () => {
        displayPopup.classList.remove('active');
    })


    // Fetch current status and set the selected radio button
    fetch('get_status.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const currentStatus = data.status;
                document.querySelector(`input[type="radio"][value="${currentStatus}"]`).checked = true;
            } else {
                console.error('Error fetching status:', data.error);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    

    //update status with radio button clicked
    allFriends.forEach(friend => {
        friend.addEventListener('click', function () {
            const radioBtn = this.querySelector('input[type="radio"]');
            radioBtn.checked = true;

            const status = radioBtn.value;

            fetch('update_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });
});
