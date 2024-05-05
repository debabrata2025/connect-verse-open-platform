const searchinput = document.querySelector('#searchinput');
const searchnames = document.querySelectorAll('.searchname');
const users_res = document.querySelectorAll('.users_res');
const search_res_box = document.querySelector('.search_res_box');
const no_user = document.querySelector('.no_user');

searchinput.addEventListener('keyup', () => {
    let updatedinput = searchinput.value.trim().toLowerCase(); // Trim input to remove leading/trailing whitespace
    if (updatedinput !== '') {
        search_res_box.style.display = 'block'; // Show the result box if input is not empty
    } else {
        search_res_box.style.display = 'none'; // Hide the result box if input is empty
    }

    let userFound = false; // Flag to track if any user is found
    for (let i = 0; i < searchnames.length; i++) {
        let searchname = searchnames[i].textContent.toLowerCase();
        if (searchname.includes(updatedinput)) {
            users_res[i].style.display = ''; // Display matched user
            userFound = true; // Set flag to true if user is found
        } else {
            users_res[i].style.display = 'none'; // Hide unmatched user
        }
    }

    // Show or hide the 'no_user' element based on the flag
    if (userFound) {
        no_user.style.display = 'none'; // Hide 'no_user' if user is found
    } else {
        no_user.style.display = 'block'; // Show 'no_user' if no user is found
    }
});
