maindiv = document.querySelector('.main_div');
const dbtn = document.querySelector('.darkm');
const nav_div = document.querySelector('.nav_div');
const sidebar = document.querySelector('.sidebar');
const navtext = document.querySelectorAll('.dtext');
const username = document.querySelectorAll('.username');
const caption = document.querySelectorAll('.des');
const dicon = document.querySelectorAll('.dicon');
const iname = document.querySelectorAll('.iname');
const ask_ques = document.querySelector('.ask_ques');
const input_grp1 = document.querySelector('.input_grp1');
const t_area_ask = document.querySelector('.t_a');
const ask_btn = document.querySelector('.a_btn');
const ans_sec_color = document.querySelectorAll('.ac_sec');
const ques_div = document.querySelectorAll('.ques_div');
const ans_area = document.querySelectorAll('.ans_area');
const textarea_a = document.querySelectorAll('.textarea_a');
const s_btn = document.querySelectorAll('.s_btn');
const main_ans = document.querySelectorAll('.main_section');
const user_name = document.querySelectorAll('.user_name');
const qt = document.querySelectorAll('.user_name');


let getmode = localStorage.getItem("mode");
if (getmode && getmode === "dark") {
    maindiv.classList.add('d_active');
    dbtn.classList.add('d_active');
    nav_div.classList.add('d_active');
    sidebar.classList.add('d_active');
    ask_ques.classList.add('d_active');
    input_grp1.classList.add('d_active');
    t_area_ask.classList.add('d_active');
    ask_btn.classList.add('d_active');
    qt.forEach((item) => {
        item.classList.add('d_active');
    });
    ans_sec_color.forEach((item) => {
        item.classList.add('d_active');
    })
    ques_div.forEach((item) => {
        item.classList.add('d_active');
    })
    ans_area.forEach((item) => {
        item.classList.add('d_active');
    })
    textarea_a.forEach((item) => {
        item.classList.add('d_active');
    })
    s_btn.forEach((item) => {
        item.classList.add('d_active');
    })
    main_ans.forEach((item) => {
        item.classList.add('d_active');
    })
    user_name.forEach((item) => {
        item.classList.add('d_active');
    })
    navtext.forEach((item) => {
        item.classList.add('d_active');
    })
    iname.forEach((item) => {
        item.classList.add('d_active');
    })
    dicon.forEach((item) => {
        item.classList.add('d_active');
    })
}

dbtn.addEventListener('click', () => {
    maindiv.classList.toggle('d_active');
    if (!maindiv.classList.contains('d_active')) {
        return localStorage.setItem("mode", "light");
    }
    return localStorage.setItem("mode", "dark");
});

dbtn.addEventListener('click', () => {
    dbtn.classList.toggle('d_active');
    // maindiv.classList.toggle('d_active');
    nav_div.classList.toggle('d_active');
    sidebar.classList.toggle('d_active');
    ask_ques.classList.toggle('d_active');
    input_grp1.classList.toggle('d_active');
    t_area_ask.classList.toggle('d_active');
    ask_btn.classList.toggle('d_active');
    qt.forEach((item) => {
        item.classList.toggle('d_active');
    });
    ans_sec_color.forEach((item) => {
        item.classList.toggle('d_active');
    })
    ques_div.forEach((item) => {
        item.classList.toggle('d_active');
    })
    ans_area.forEach((item) => {
        item.classList.toggle('d_active');
    })
    textarea_a.forEach((item) => {
        item.classList.toggle('d_active');
    })
    s_btn.forEach((item) => {
        item.classList.toggle('d_active');
    })
    main_ans.forEach((item) => {
        item.classList.toggle('d_active');
    })
    user_name.forEach((item) => {
        item.classList.toggle('d_active');
    })
    iname.forEach((item) => {
        item.classList.toggle('d_active');
    })
    navtext.forEach((item) => {
        item.classList.toggle('d_active');
    })
    dicon.forEach((item) => {
        item.classList.toggle('d_active');
    })
})