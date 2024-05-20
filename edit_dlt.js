const three_dots = document.querySelectorAll('.c_three_dot'); 
const dialauge = document.querySelectorAll('.dialauge');

three_dots.forEach((item, index) => {
    item.addEventListener('click', () => {
        dialauge[index].classList.toggle('active');
    })
});