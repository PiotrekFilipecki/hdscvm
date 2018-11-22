// import external dependencies
import 'jquery';

// Import everything from autoload
import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
// import work from './routes/work';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

jQuery(function($){
  const video = $('.video-background video');

  video.on('ended',function(){

    $('.video-background').fadeOut();

});
  window.onload = loadFirst;

  function loadFirst() {
    var filter = $('#filter');
    $.ajax({
      url:filter.attr('action'),
      data:filter.serialize(), // form data
      type:filter.attr('method'), // POST
      beforeSend:function(){

      },
      success:function(data){
        $('#response').fadeIn().html(data); // insert data
      },
    });
    return false;

  }
  $('.category').on('change', function(){
    $('#response').fadeOut();
    console.log('change');
    // $(this).closest('form').submit();
    var filter = $('#filter');
  $.ajax({
    url:filter.attr('action'),
    data:filter.serialize(), // form data
    type:filter.attr('method'), // POST
    beforeSend:function(){
      // $('#response').fadeOut();
    },
    success:function(data){
      // $('#response').fadeIn();
      $('#response').fadeIn().html(data); // insert data
    },
  });
  return false;
});
});


// $('#filter').submit(function(){
//   var filter = $('#filter');
//   $.ajax({
//     url:filter.attr('action'),
//     data:filter.serialize(), // form data
//     type:filter.attr('method'), // POST
//     beforeSend:function(){
//       filter.find('button').text('Processing...'); // changing the button label
//     },
//     success:function(data){
//       filter.find('button').text('Apply filter'); // changing the button label back
//       $('#response').html(data); // insert data
//     },
//   });
//   return false;
// });
