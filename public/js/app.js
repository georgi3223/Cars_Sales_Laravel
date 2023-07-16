
//Mobile Menu
$(document).ready(function() {
    $('#toggleButton').click(function() {
       $('#mobileMenu').slideToggle();
    });

    $(document).click(function(event) {
       if (!$(event.target).closest('#toggleButton').length && !$(event.target).closest('#mobileMenu').length) {
          $('#mobileMenu').slideUp();
       }
    });
 });

//Car Select Model 
$(document).ready(function() {
    $('#make').on('change', function() {
        var make = $(this).val();
        var models = getModelOptions(make);
        populateModels(models);
    });

    function getModelOptions(make) {
        var modelOptions = {
            Audi: ['A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'Q3', 'Q5', 'Q7', 'Q8', 'R8', 'TT'],
            Bmw: ['1 Series', '2 Series', '3 Series', '4 Series', '5 Series', '6 Series', '7 Series', '8 Series', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7', 'Z4', 'i3', 'i8'],
            Mercedes: ['A-Class', 'B-Class', 'C-Class', 'E-Class', 'S-Class', 'CLA', 'CLS', 'GLA', 'GLB', 'GLC', 'GLE', 'GLS', 'GLK', 'GLC', 'SLC', 'SL', 'AMG GT', 'G-Class'],
            Volkswagen: ['Arteon', 'Atlas', 'Beetle', 'CC', 'Eos', 'Golf', 'GTI', 'Jetta', 'Passat', 'Phaeton', 'Tiguan', 'Touareg']
            // Add more make and model options here
        };
        return modelOptions[make] || [];
    }

    function populateModels(models) {
        var $modelSelect = $('#model');
        $modelSelect.empty();
        $modelSelect.append('<option value="">All Models</option>');
        $.each(models, function(index, model) {
            $modelSelect.append('<option value="' + model + '">' + model + '</option>');
        });
    }
});



//Image Slider
$(document).ready(function () {
  const mainImage = $('#currentImage');
  const carouselImages = $('.carousel-image');
  const prevBtn = $('#prevBtn');
  const nextBtn = $('#nextBtn');
  let currentImageIndex = 0;

  // Show the current image
  function showImage(index) {
    mainImage.attr('src', $(carouselImages[index]).attr('src'));
  }

  // Event listener for previous button
  prevBtn.on('click', function () {
    currentImageIndex--;
    if (currentImageIndex < 0) {
      currentImageIndex = carouselImages.length - 1;
    }
    showImage(currentImageIndex);
  });

  // Event listener for next button
  nextBtn.on('click', function () {
    currentImageIndex++;
    if (currentImageIndex >= carouselImages.length) {
      currentImageIndex = 0;
    }
    showImage(currentImageIndex);
  });
});


  