profilebox = document.querySelector('.box');
const maindiv = document.querySelector('.main_div');
let dbtn = document.querySelector('.darkm');
const nav_div = document.querySelector('.nav_div');
const username = document.querySelector('.up_name');
const penicon = document.querySelector('.fa-pen-to-square');
const pdes = document.querySelector('.profile_des');
const navtext = document.querySelectorAll('.dtext');
const logout = document.querySelector('.fa-sign-out');
const profile_videos_div = document.querySelector('.profile_videos_div');
//profile description
let dp_profile = document.querySelector('.desp_pp');
const main_friends1 = document.querySelector('.main_friends1');
const main_friends = document.querySelector('.main_friends');
const s_head = document.querySelectorAll('.s_head');
const ss = document.querySelectorAll('.ss');
const sss = document.querySelectorAll('.sss');
const comic = document.querySelectorAll('.comic');
const ppicon = document.querySelectorAll('.pp_icon');
const cross_btn = document.querySelectorAll('.xcxc');
const lbtns = document.querySelectorAll('.ld');
const d_pen = document.querySelector(".d_pen");
des_edit_main = document.querySelector('.des_edit_main');


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
    dp_profile.classList.add('d_active');
    main_friends1.classList.add('d_active');
    main_friends.classList.add('d_active');
    d_pen.classList.add('d_active');
    des_edit_main.classList.add('d_active');
    lbtns.forEach((item)=>{
        item.classList.add('d_active');
    })
    s_head.forEach((item)=>{
        item.classList.add('d_active');
    })
    cross_btn.forEach((item)=>{
        item.classList.add('d_active');
    })
    navtext.forEach((item)=>{
        item.classList.add('d_active');
    })
    ss.forEach((item)=>{
        item.classList.add('d_active');
    })
    comic.forEach((item)=>{
        item.classList.add('d_active');
    })
    ppicon.forEach((item)=>{
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
    // while switching modes a small vibration will happen in phone
    if (navigator.vibrate) {
        navigator.vibrate(5); // Extremely brief vibration for 5 milliseconds
    }

    profilebox.classList.toggle('d_active');
    dbtn.classList.toggle('d_active');
    // maindiv.classList.toggle('d_active');
    logout.classList.toggle('d_active');
    nav_div.classList.toggle('d_active');
    penicon.classList.toggle('d_active');
    pdes.classList.toggle('d_active');
    username.classList.toggle('d_active');
    profile_videos_div.classList.toggle('d_active');    
    dp_profile.classList.toggle('d_active');
    main_friends1.classList.toggle('d_active');
    main_friends.classList.toggle('d_active');
    d_pen.classList.toggle('d_active');
    des_edit_main.classList.toggle('d_active');
    lbtns.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    s_head.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    cross_btn.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    navtext.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    ss.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    comic.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    ppicon.forEach((item)=>{
        item.classList.toggle('d_active');
    })
})