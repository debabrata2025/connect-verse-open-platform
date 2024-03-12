const maindiv = document.querySelector('.main_div');
const formbox = document.querySelector('.box');
const mainhead = document.querySelector('.mh');
const subhead = document.querySelector('.sh');
const allinp = document.querySelectorAll('.mi');
const eyeicon = document.querySelectorAll('.fa-eye');
const lasthead = document.querySelector('.lh');
const remember = document.querySelector('.check_div');


let getmode = localStorage.getItem("mode");

if(getmode && getmode === "dark"){
    maindiv.classList.add('d_active');
    formbox.classList.add('d_active');
    mainhead.classList.add('d_active');
    subhead.classList.add('d_active');
    lasthead.classList.add('d_active');
    allinp.forEach((item)=>{
        item.classList.add('d_active');
    });
    eyeicon.forEach((item)=>{
        item.classList.add('d_active');
    });
}

// maindiv.addEventListener('click', () => {
//     maindiv.classList.toggle('d_active');
//     formbox.classList.toggle('d_active');
//     mainhead.classList.toggle('d_active');
//     subhead.classList.toggle('d_active');
//     lasthead.classList.toggle('d_active');
//     allinp.forEach((item)=>{
//         item.classList.toggle('d_active');
//     })
//     eyeicon.forEach((item)=>{
//         item.classList.toggle('d_active');
//     })
// })
