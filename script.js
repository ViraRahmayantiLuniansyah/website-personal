document.addEventListener('DOMContentLoaded', () => {
    const aboutImg = document.querySelector('.about-img img');

    aboutImg.classList.add('visible');
  
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target); 
        }
      });
    }, {
      threshold: 0.5 
    });
  
    observer.observe(aboutImg); 
  });