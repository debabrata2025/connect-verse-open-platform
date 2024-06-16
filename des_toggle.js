 let c_phead = document.querySelector('.dddd');
 let cross_btn = document.querySelectorAll('.xcxc');

main_friends = document.querySelector('.main_friends');
s_head = document.querySelectorAll('.s_head');
ss = document.querySelectorAll('.ss');

getmode = localStorage.getItem("mode");
if (getmode && getmode === "dark") {
    main_friends.classList.add('d_active');
    s_head.forEach((item)=>{
        item.classList.add('d_active');
    })
    cross_btn.forEach((item)=>{
        item.classList.add('d_active');
    })
    c_phead.classList.add('d_active');

}

dbtn.addEventListener('click', () => {

    c_phead.classList.toggle('d_active');
    main_friends.classList.toggle('d_active');
    s_head.forEach((item)=>{
        item.classList.toggle('d_active');
    })
    cross_btn.forEach((item)=>{
        item.classList.toggle('d_active');
    })

})