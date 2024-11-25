document.addEventListener('DOMContentLoaded', function() {

  var menu = document.getElementById('menu');
  var header = document.querySelector('header');
  var top = document.querySelector('.top');
  var links = document.querySelectorAll('a[href*="#"]');

  // menu click event listener
  menu.addEventListener('click', function() {
    this.classList.toggle('fa-times');
    header.classList.toggle('toggle');
  });

  // scroll event listener
  window.addEventListener('scroll', function() {
    menu.classList.remove('fa-times');
    header.classList.remove('toggle');
    if (window.scrollY > 0) {
      top.style.display = 'block';
    } else {
      top.style.display = 'none';
    }
  });

  // smooth scrolling for links
  for (var i = 0; i < links.length; i++) {
    links[i].addEventListener('click', function(e) {
      e.preventDefault();
      var target = document.querySelector(this.getAttribute('href'));
      window.scrollTo({
        top: target.offsetTop,
        behavior: 'smooth'
      });
    });
  }

});
