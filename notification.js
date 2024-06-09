let bell_icon = document.querySelector('.bell_noti');
const noti_dash = document.querySelector('.main_notification');

// Function to toggle showactive class
const ShowActive = (event) => {
    noti_dash.classList.add('active');
    event.stopPropagation(); // Stop event from propagating to document
  };

  // Function to remove showactive class
  const removeActive = () => {
    noti_dash.classList.remove('active');
  };

  // Add click event listeners to specific comment buttons
  bell_icon.addEventListener('click', ShowActive);

  // Add click event listener to the document
  document.addEventListener('click', removeActive);

  // Prevent the comment box from being deactivated when it's clicked
  noti_dash.addEventListener('click', (event) => {
    event.stopPropagation();
  });