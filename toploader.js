//top loader
window.onload = function() {
    var loadingBar = document.querySelector('.loading-bar');
    loadingBar.style.width = '100%';
    setTimeout(function() {
      loadingBar.style.display = 'none';
    }, 500); // Adjust this timeout according to your needs
  };