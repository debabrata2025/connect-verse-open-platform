const three_dots = document.querySelectorAll('.c_three_dot'); 
const dialauge = document.querySelectorAll('.dialauge');

three_dots.forEach((item, index) => {
    item.addEventListener('click', () => {
        // while switching modes a small vibration will happen in phone
        if (navigator.vibrate) {
            navigator.vibrate(2); // Extremely brief vibration for 5 milliseconds
        }
        dialauge[index].classList.toggle('active');
    })
});