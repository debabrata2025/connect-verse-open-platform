profilebox = document.querySelector('.box');
const maindiv = document.querySelector('.main_div');
const dbtn = document.querySelector('.darkm');
const nav_div = document.querySelector('.nav_div');
const username = document.querySelector('.up_name');
const penicon = document.querySelector('.fa-pen-to-square');
const pdes = document.querySelector('.profile_des');
const navtext = document.querySelectorAll('.dtext');
const logout = document.querySelector('.fa-sign-out');
const profile_videos_div = document.querySelector('.profile_videos_div');

let getmode = localStorage.getItem("mode");

if(getmode && getmode === "dark"){
    profilebox.classList.add('d_active');
    dbtn.classList.add('d_active');
    maindiv.classList.add('d_active');
    nav_div.classList.add('d_active');
    penicon.classList.add('d_active');
    logout.classList.add('d_active');
    pdes.classList.add('d_active');
    username.classList.add('d_active');
    profile_videos_div.classList.add('d_active');
    navtext.forEach((item)=>{
        item.classList.add('d_active');
    })
}

dbtn.addEventListener('click', () => {
    maindiv.classList.toggle('d_active');
    if(!maindiv.classList.contains('d_active')){
        return localStorage.setItem("mode", "light");
    }
    return localStorage.setItem("mode", "dark");
});

dbtn.addEventListener('click', () => {
    profilebox.classList.toggle('d_active');
    dbtn.classList.toggle('d_active');
    // maindiv.classList.toggle('d_active');
    logout.classList.toggle('d_active');
    nav_div.classList.toggle('d_active');
    penicon.classList.toggle('d_active');
    pdes.classList.toggle('d_active');
    username.classList.toggle('d_active');
    profile_videos_div.classList.toggle('d_active');
    navtext.forEach((item)=>{
        item.classList.toggle('d_active');
    })
})