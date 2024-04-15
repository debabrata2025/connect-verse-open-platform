// Define updatestatus function
let onstate = false;
const updatestatus = () => {
    const internet_status = document.querySelector('.internet_status');
    const status = document.querySelector('.status');
    if (navigator.onLine) {
        if (onstate) {
            internet_status.classList.remove('active');
            setTimeout(() => {
                internet_status.classList.add('active');
                status.innerHTML = "Back Online";
                status.classList.add('online');
                status.classList.remove('offline');
            }, 500);
            setTimeout(() => {
                internet_status.classList.remove('active');
            }, 5000);
            
        }
    } else {
        internet_status.classList.add('active');
        status.innerHTML = "No internet connection";
        status.classList.add('offline');
        status.classList.remove('online');
        onstate = true;
    }
}

// Add event listeners after function definition
window.addEventListener('online', updatestatus);
window.addEventListener('offline', updatestatus);

// Call updatestatus initially
updatestatus();