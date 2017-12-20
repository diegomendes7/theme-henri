jQuery(document).ready(function($) {
  new WOW().init();

  var $grid = jQuery('.grid').isotope({
    // options
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
  });
});

jQuery(document).ready(function($) {
  var $grid = jQuery('.grid').isotope({
    // options
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
  });

  jQuery('.filter-button-group').on( 'click', 'button', function() {
    var filterValue = jQuery(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });
});

/* ini: carousel banner rotarivo responsivo */
  function setCarouselImage(carousel) {
    var windowsize = jQuery(window).width();

    carousel.find( '.item' ).each(function() {
      var imgCelular = jQuery(this).attr("data-img-celular");
      var imgTablet = jQuery(this).attr("data-img-tablet");
      var imgDesktop = jQuery(this).attr("data-img-desktop");

      if (windowsize < 768) {
        jQuery(this).css("background-image", "url('" + imgCelular + "')");
      } else if (windowsize >= 768 && windowsize < 992) {
        jQuery(this).css("background-image", "url('" + imgTablet + "')");
      } else if (windowsize >= 992) {
        jQuery(this).css("background-image", "url('" + imgDesktop + "')");
      }
    });
  }
  setCarouselImage(jQuery("#carousel-home"));
   window.addEventListener("resize", function () {
      console.log("resize");
      setCarouselImage(jQuery("#carousel-home"));
  }, false);
  /* end: carousel banner rotarivo responsivo */
