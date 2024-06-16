// text area height increase with text
const comment_area_main = document.querySelectorAll('.comment_area_main');
comment_area_main.forEach((ta) => {
            ta.addEventListener('input', function () {
                this.style.height = 'auto';
                this.style.height = this.scrollHeight + 'px';
            });
        })

// share btn click input box btn display
const comment_btn_sec = document.querySelectorAll('.fa-comment');
const comment_sec = document.querySelectorAll('.send_btn_comment');
const commentSection = document.querySelectorAll('.show_cmnt');

//clicking on commet btn and toggle the comment setion
comment_btn_sec.forEach((item, index) => {
    item.addEventListener('click', () => {
        comment_sec[index].classList.toggle('active');
        comment_area_main[index].focus();
        // while switching modes a small vibration will happen in phone
        if (navigator.vibrate) {
            navigator.vibrate(2); // Extremely brief vibration for 5 milliseconds
        }
    })
})
comment_area_main.forEach((item, index) => {
    item.addEventListener('focus', () => {
        comment_sec[index].classList.add('active');
        // while switching modes a small vibration will happen in phone
        if (navigator.vibrate) {
            navigator.vibrate(2); // Extremely brief vibration for 5 milliseconds
        }
    })
})

//toggle all comments 
const view_commets_btn = document.querySelectorAll('.view_commets_btn');

view_commets_btn.forEach((item, index) => {
    item.addEventListener('click', () => {
        commentSection[index].classList.toggle('active');
        // while switching modes a small vibration will happen in phone
        if (navigator.vibrate) {
            navigator.vibrate(2); // Extremely brief vibration for 5 milliseconds
        }
    });
});

// comments sending and receiving responce using ajax

user_name = document.querySelectorAll('.user_name');
main_comment = document.querySelectorAll('.main_comment');

comment_sec.forEach((button, index) => {
    button.addEventListener('click', function() {
        let postId = this.getAttribute('data-post-id');
        let userName = this.getAttribute('data-user-name');
        let userImg = this.getAttribute('data-user-img');
        let userEmail = this.getAttribute('data-user-email');
        let postuserEmail = this.getAttribute('data-postuser-email');
        let commentBox = this.closest('.c_comment_box').querySelector('.comment_area_main');
        let commentText = commentBox.value;

        if (commentText.trim() === '') {
            alert('Comment cannot be empty');
            return;
        }

        let data = {
            postId: postId,
            userName: userName,
            userImg: userImg,
            comment: commentText,
            userEmail: userEmail,
            postuserEmail : postuserEmail
        };

        fetch('submit_comment.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                const newCommentHtml = `
                    <div class="comment_users">
                        <div class="c_user_img">
                            <img src="${userImg}" alt="">
                        </div>
                        <div class="c_comment">
                            <div class="user_name">${userName}</div>
                            <div class="main_comment">${commentText}</div>
                        </div>
                    </div>
                `;
                console.log(commentText);
                // Append the new comment to the comment section
                commentSection[index].insertAdjacentHTML('afterbegin', newCommentHtml);
                // Check dark mode and apply class if necessary
                const newCommentElement = commentSection[index].querySelector('.comment_users');
                const newUserName = newCommentElement.querySelector('.user_name');
                const newMainComment = newCommentElement.querySelector('.main_comment');
                const newCComment = newCommentElement.querySelector('.c_comment');
                let getmode = localStorage.getItem("mode");
                console.log(getmode);
                if (getmode && getmode === "dark") {
                    
                    if (newCommentElement) {
                        if (newUserName) {
                            newUserName.classList.add('d_active');
                        }
                        if (newMainComment) {
                            newMainComment.classList.add('d_active');
                        }
                        if (newCComment) {
                            newCComment.classList.add('d_active');
                        }
                    }
                }

                dbtn.addEventListener('click', () => {
                    if (newCommentElement) {
                        if (newUserName) {
                            newUserName.classList.toggle('d_active');
                        }
                        if (newMainComment) {
                            newMainComment.classList.toggle('d_active');
                        }
                        if (newCComment) {
                            newCComment.classList.toggle('d_active');
                        }
                    }
                })

                // Clear the comment box
                commentBox.value = "";
            } else {
                alert('Failed to submit comment');
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
