$(document).ready(function() {
    let counter = 0;
  
    // Start the changing images
    setInterval(function() {
      if(counter == 9) { 
        counter = 0; 
      }
  
      changeImage(counter);
      counter++;
    }, 3000);
  
    // Set the percentage off
    loading();
  });
  
  function changeImage(counter) {
    let images = [
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">',
      '<img src="/assets/images/lama.jpeg" alt="image de loader">'
    ];
  
    $(".loader .image").html(""+ images[counter] +"");
  }
  
  function loading(){
    let num = 0;
  
    for(i=0; i<=100; i++) {
      setTimeout(function() { 
        $('.loader span').html(num+'%');
  
        if(num == 100) {
          loading();
        }
        num++;
      },i*120);
    };
  
  }