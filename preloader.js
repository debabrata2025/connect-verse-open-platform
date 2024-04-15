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

setTimeout(() => {
    preloader.style.display = 'none';
    clearInterval(myinterval);
}, 2000);