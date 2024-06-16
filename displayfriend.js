const connectBtn = document.querySelectorAll('.sub_add_friend');
const displayPopup = document.querySelector('.friends_overlay');
const cancel_btn = document.querySelector('.can_btn');


//fetch all frieds of user

function fetchallFriends() {
    fetch('fetchFriends.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok ');
            }
            return response.json();
        }).then(result => {
            if (result.success) {
                const requests = result.data;
                const main_friends_all = document.querySelector('.main_friends_all');
                main_friends_all.innerHTML = ''; // Clear existing notifications

                requests.forEach(request => {
                    const userDiv = document.createElement('div');
                    userDiv.className = 'all_friend';

                    userDiv.innerHTML = `
                    <a href="checkprofile.php?useremail=${request.email}">
                        <div class="friends_img">
                            <img src="${request.image}" alt="" loading="lazy">
                        </div>
                        <div class="friends_name">
                            <p class="name">${request.name}</p>
                            <p class="friends_count">${request.description}</p>
                        </div>
                    </a>
                    `;
                    const name = userDiv.querySelector('.name');

                    let getmode = localStorage.getItem("mode");
                    if(getmode && getmode === "dark"){
                        name.classList.add('d_active');
                    }

                    main_friends_all.appendChild(userDiv);
                    console.log(request);
                });

                console.log('fetched');
            } else {
                console.log("problem occured to fetch the friends");
            }
        }).catch(error => console.error('Error:', error));
}


//show popup and fetch the friends
connectBtn[1].addEventListener('click', function () {
    displayPopup.classList.add('active');
    fetchallFriends();

})


//hide popup
cancel_btn.addEventListener('click', () => {
    displayPopup.classList.remove('active');
})