const maindiv = document.querySelector(".main_div");
const box = document.querySelector(".box");
const heading = document.querySelector(".mh");
const subhead = document.querySelector(".sh");

let getmode = localStorage.getItem("mode");
if(getmode && getmode === 'dark'){
    maindiv.classList.add('d_active');
    box.classList.add('d_active');
    heading.classList.add('d_active');
    subhead.classList.add('d_active');
}