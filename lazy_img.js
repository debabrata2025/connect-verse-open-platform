document.addEventListener('DOMContentLoaded', () => {
    const targets = document.querySelectorAll('.media');
  
    const lazyLoad = target => {
      const wrapper = target.parentElement;
      wrapper.classList.add('loading');
  
      const io = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            const src = img.getAttribute('data-lazy');
  
            img.onload = () => {
              img.classList.add('fade');
              wrapper.classList.remove('loading');
            };
  
            img.onerror = () => {
              console.error(`Failed to load image: ${src}`);
              wrapper.classList.remove('loading');
            };
            img.setAttribute('src', src);
  
            observer.unobserve(img); // Stop observing the image
          }
        });
      });
  
      io.observe(target);
    };
  
    targets.forEach(lazyLoad);
  });
  