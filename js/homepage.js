
  var imageContainer = document.querySelector('.image');
  var scrollSpeed = 2;
  function continuousScroll() {
      imageContainer.scrollLeft += scrollSpeed;
      if (imageContainer.scrollLeft >= (imageContainer.scrollWidth - imageContainer.clientWidth)) {
          imageContainer.scrollLeft = 0;
      }
  }
  var scrollInterval = setInterval(continuousScroll, 50); 
  imageContainer.addEventListener('mouseenter', function() {
      clearInterval(scrollInterval);
  });

  imageContainer.addEventListener('mouseleave', function() {
      scrollInterval = setInterval(continuousScroll, 50); 
  });

  document.getElementById('scroll-left').addEventListener('click', function() {
      imageContainer.scrollBy({
          left: 100, 
          behavior: 'smooth'
      });
  });

  document.getElementById('scroll-right').addEventListener('click', function() {
      imageContainer.scrollBy({
          left: -100, 
          behavior: 'smooth'
      });
  });
