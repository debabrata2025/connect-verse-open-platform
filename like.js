let lbtnicon = document.querySelectorAll('.fa-heart');
let likeCountDisplay = document.querySelectorAll('.like-count');

document.querySelectorAll('.like').forEach((likeBtn, index) => {
    likeBtn.addEventListener('click', (event) => {
        const postId = likeBtn.getAttribute('data-post-id');
        console.log(postId);

        // Send AJAX request to backend PHP script
        fetch('like.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'postId=' + encodeURIComponent(postId), // Sending postId as form data
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update frontend UI based on response
                    if (data.isLiked) {
                        lbtnicon[index].classList.add('fa-solid');
                        lbtnicon[index].classList.add('active');
                    } else {
                        lbtnicon[index].classList.remove('fa-solid');
                        lbtnicon[index].classList.remove('active');
                    }

                    // Update like count
                    if (data.likeCount < 1) {
                        likeCountDisplay[index].textContent = 'no';
                    } else {
                        likeCountDisplay[index].textContent = data.likeCount;
                    }
                } else {
                    console.error('Failed to process like');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

    });

    // Initial state based on server data
    const initialLikeState = likeBtn.getAttribute('data-initial-like-state');
    if (initialLikeState === '1') {
        lbtnicon[index].classList.add('fa-solid');
        lbtnicon[index].classList.add('active');
    }
});
