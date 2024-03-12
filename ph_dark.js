      
if(getmode && getmode === "dark"){
    maindiv.classList.add('d_ph');
    nav_div.classList.add('d_ph');
    sidebar.classList.add('d_ph');
    video_content_div.forEach((item)=>{
        item.classList.add('d_ph');
    })
}

dbtn.addEventListener('click', () => {
    maindiv.classList.toggle('d_ph');
    if(!maindiv.classList.contains('d_ph')){
        return localStorage.setItem("mode", "light");
    }
    localStorage.setItem("mode", "dark");
})

dbtn.addEventListener('click',() => {
    // maindiv.classList.toggle('d_ph');
    nav_div.classList.toggle('d_ph');
    sidebar.classList.toggle('d_ph');
    video_content_div.forEach((item)=>{
        item.classList.toggle('d_ph');
    })
})