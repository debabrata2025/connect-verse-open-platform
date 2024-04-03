 // Define updatestatus function
 const updatestatus = () => {
    const internet_status = document.querySelector('.internet_status');
    const status = document.querySelector('.status');
    if (navigator.onLine) {
        internet_status.classList.add('active');
        setTimeout(() => {
            internet_status.classList.remove('active');
        }, 1500);
        status.innerHTML = "Back Online";
        status.classList.add('online');
        status.classList.remove('offline');
    } else {
        internet_status.classList.add('active');
        status.innerHTML = "No internet connection";
        status.classList.add('offline');
        status.classList.remove('online');
    }
}

// Add event listeners after function definition
window.addEventListener('online', updatestatus);
window.addEventListener('offline', updatestatus);

// Call updatestatus initially
updatestatus();