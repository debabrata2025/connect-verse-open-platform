let confirmBtns = document.querySelectorAll('.com_btn');

confirmBtns.forEach((btn)=> {
    btn.addEventListener('click', function(){
        console.log(btn);
    })
})