 maindiv = document.querySelector('.main_div');
 profilebox = document.querySelector('.box');
const dbtn = document.querySelector('.darkm');
const nav_div = document.querySelector('.nav_div');
const sidebar = document.querySelector('.sidebar');
const video_content_div = document.querySelectorAll('.main_vids');
const navtext = document.querySelectorAll('.dtext');
const username = document.querySelectorAll('.username');
const caption = document.querySelectorAll('.des');
const dicon = document.querySelectorAll('.dicon');
const iname = document.querySelectorAll('.iname');
const logout = document.querySelector('.fa-sign-out');
const showmore = document.querySelectorAll('.sbtn');
const commentshow = document.querySelector('.main_show_div1');
const commentshowhead = document.querySelector('.heading_show1');
const c_user = document.querySelectorAll('.userdiv1');
const c_msg = document.querySelectorAll('.msg1');
const c_icon = document.querySelectorAll('.mic');
//faq
const f_box = document.querySelector('.faq_box');
const f_sec = document.querySelectorAll('details');

//top options
const optionsTop = document.querySelector('.scroll_option');
let options = document.querySelectorAll('.op');
let dt = document.querySelectorAll('.dt');

//scroll top

let lastScrollTop = 0;
container = document.querySelector('.main_div');
scrollOption = document.querySelector('.scroll_option');

container.addEventListener('scroll', () => {
    let currentScroll = container.scrollTop;

    if (currentScroll > lastScrollTop) {
        // Down scroll
        scrollOption.classList.add('active');
    } else {
        // Up scroll
        scrollOption.classList.remove('active');
    }

    lastScrollTop = currentScroll;
});



 //top options bar 
 for (let i = 0; i < options.length; i++) {
    options[i].addEventListener('click', () => {
        dt.forEach((elem) => {
            elem.classList.remove('d_da');
        })
        options.forEach((element) => {
            element.classList.remove('d_da');
        });
        options[i].classList.add('d_da');
        dt[i].classList.add('d_da');
    })
}


let getmode = localStorage.getItem("mode");
if (getmode && getmode === "dark") {

    maindiv.classList.add('d_active');
    profilebox.classList.add('d_active');
    dbtn.classList.add('d_active');
    nav_div.classList.add('d_active');
    sidebar.classList.add('d_active');
    commentshow.classList.add('d_active');
    commentshowhead.classList.add('d_active');
    logout.classList.add('d_active');
    f_box.classList.add('d_active');
    optionsTop.classList.add('d_active');
    options[0].classList.add('d_da');
    dt[0].classList.add('d_da');
    options.forEach((item) => {
        item.classList.add('d_active')
    })
    dt.forEach((item) => {
        item.classList.add('d_active')
    })
    f_sec.forEach((item) => {
        item.classList.add('d_active');
    });
    c_icon.forEach((item)=>{
        item.classList.add('d_active');
    });
    c_msg.forEach((item)=>{
        item.classList.add('d_active');
    })
    c_user.forEach((item)=>{
        item.classList.add('d_active');
    })
    showmore.forEach((item)=>{
        item.classList.add('d_active');
    })
    iname.forEach((item)=>{
        item.classList.add('d_active');
    })
    dicon.forEach((item)=>{
        item.classList.add('d_active');
    })
    username.forEach((item)=>{
        item.classList.add('d_active');
    })
    caption.forEach((item)=>{
        item.classList.add('d_active');
    })
    video_content_div.forEach((item)=>{
        item.classList.add('d_active');
    })
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

    dt.forEach((elem) => {
        elem.classList.remove('d_da');
    })
    options.forEach((element) => {
        element.classList.remove('d_da');
    });


    profilebox.classList.toggle('d_active');
    dbtn.classList.toggle('d_active');
    // maindiv.classList.toggle('d_active');
    nav_div.classList.toggle('d_active');
    sidebar.classList.toggle('d_active');
    commentshow.classList.toggle('d_active');
    commentshowhead.classList.toggle('d_active');
    logout.classList.toggle('d_active');
    f_box.classList.toggle('d_active');
    optionsTop.classList.toggle('d_active');
    options[0].classList.toggle('d_da');
    dt[0].classList.toggle('d_da');
    options.forEach((item) => {
        item.classList.toggle('d_active')
    })
    dt.forEach((item) => {
        item.classList.toggle('d_active')
    })
    f_sec.forEach((item) => {
        item.classList.toggle('d_active');
    });
    c_icon.forEach((item)=>{
        item.classList.toggle('d_active');
    });
    c_msg.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    c_user.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    showmore.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    iname.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    dicon.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    username.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    caption.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    video_content_div.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    navtext.forEach((item)=>{
        item.classList.toggle('d_active');
    })
})