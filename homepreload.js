//preloader
const preloader = document.querySelector('#loader');
const change_name = document.querySelector('#titleid');
const arr = ['verse', 'you'];
let currentIndex = 0;

change_name.innerHTML = arr[currentIndex];

const myinterval = setInterval(() => {
    currentIndex = (currentIndex + 1) % arr.length;
    change_name.innerHTML = arr[currentIndex];
    console.log('running');
}, 1500);


if (!sessionStorage.getItem('fLoad')) {
    // Show the preloader if it's the first load
    preloader.style.display = 'flex';

    // Simulate content loading (replace with your actual loading process)
    setTimeout(function() {
        // Hide the preloader
        preloader.style.display = 'none';
        clearInterval(myinterval);
        // Set the flag indicating that the page has been loaded
        sessionStorage.setItem('fLoad', true);
    }, 2000); // Adjust the timeout as needed
}else{
    preloader.style.display = 'none';
}





// setTimeout(() => {
//     preloader.style.display = 'none';
//     clearInterval(myinterval);
// }, 2000);