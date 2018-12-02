$(document).ready(function() {

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  var flag = 1;
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  // Stick the header at top on scroll
  $("#header").sticky({topSpacing:0, zIndex: '50'});

  // Intro background carousel
  $("#intro-carousel").owlCarousel({
    autoplay: true,
    dots: false,
    loop: true,
    animateOut: 'fadeOut',
    items: 1
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });

  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  // Smooth scroll for the menu and links with .scrollto classes
  $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if( ! $('#header').hasClass('header-fixed') ) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });


  // Porfolio - uses the magnific popup jQuery plugin
  $('.portfolio-popup').magnificPopup({
    type: 'image',
    removalDelay: 300,
    mainClass: 'mfp-fade',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300,
      easing: 'ease-in-out',
      opener: function(openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });

  // Testimonials carousel (uses the Owl Carousel library)
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: { 0: { items: 1 }, 768: { items: 2 }, 900: { items: 3 } }
  });

  // Clients carousel (uses the Owl Carousel library)
  $(".clients-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    responsive: { 0: { items: 2 }, 768: { items: 4 }, 900: { items: 6 }
    }
  });
  $("#slideTo").click(function(){
    if(flag==1){
      flag==0;
      var html = "<a target=\"_blank\" href=\"img/goo.png\">\
              <img src=\"img/goo.png\" alt=\"goo\" style=\"width:150px\">\
            </a>\
            <hr>\
            <a target=\"_blank\" href=\"img/yah.png\">\
              <img src=\"img/yah.png\" alt=\"yah\" style=\"width:150px\">\
            </a>\
            <hr>";
      var cont = $("#slideToContent");
      cont.empty();
      cont.append(html);
    }
    //TODO Ajax here to request for past projects thumbnail
  });


  // For use with dynamic Google maps
  if ($('#google-map').length) {
    var get_latitude = $('#google-map').data('latitude');
    var get_longitude = $('#google-map').data('longitude');

    function initialize_google_map() {
      var myLatlng = new google.maps.LatLng(get_latitude, get_longitude);
      var mapOptions = {
        zoom: 14,
        scrollwheel: false,
        center: myLatlng
      };
      var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
      var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
      });
    }
    google.maps.event.addDomListener(window, 'load', initialize_google_map);
  }

  $('#header').ready(function(){
      $.get('navbarData',function(res){
          console.log(res);
          var nav = $('#navbar-dropdownJenis');
          for (var i = 0; i < res.length; i++) {
              nav.append('<li><a href="showProjects/'+res[i].id+'">'+res[i].type_name+'</a></li>');
          }
      });
  });

  var skill_tags = [];
  $('#homeDivSkillFilter').ready(function(){
      $.get('sidenavData',function(res){
          console.log(res);
          for (var i = 0; i < res.length; i++) {
              skill_tags.push(res[i].tags_name);
          }
      });
      $('#homeSkillFilter').autocomplete({
          source: skill_tags
      });
      $('#homeSkillFilter1').autocomplete({
          source: skill_tags
      });
      $('#homeSkillFilter2').autocomplete({
          source: skill_tags
      });
      $('#homeSkillFilter3').autocomplete({
          source: skill_tags
      });
      $('#homeSkillFilter4').autocomplete({
          source: skill_tags
      });
  });
  
  // $('#homeSkillFilter').keyup(function(){
  //     console.log(string);
  //     $.get('sidenavData',function(res){
  //         console.log(res);
  //         for (var i = 0; i < res.length; i++) {
  //             skill_tags.append(res[i].tags_name);
  //         }
  //         $('#homeSkillFilter').autocomplete({
  //             source: skill_tags
  //         });
  //     });
  // });
  $('#editCurrentProfile').click(function(){
      var tempp = $('#cuGithub').text();
      $('#cuGithub').empty();
      var temp = $('#cuWebsite').text();
      $('#cuWebsite').empty();
      var temp1 = $('#cuPhone').text();
      $('#cuPhone').empty();
      var temp2 = $('#cuName').text();
      temp2 = temp2.split(',');
      var temp2b = temp2[1];
      var temp2a = "";
      for (var i = 1; i < temp2b.length; i++) {
        temp2a+=temp2b[i];
      }
      temp2 = temp2[0];
      $('#cuName').empty();
      var temp3 = $('#cuDescTitle').text();
      $('#cuDescTitle').empty();
      var temp4 = $('#cuDesc').text();
      $('#cuDesc').empty();

      $('#cuGithub').append('<div class="form-group"><input id="saveGithub" name="github" class"form-control" placeholder="github" value="'+tempp+'"></div>');
      $('#cuWebsite').append('<div class="form-group"><input id="saveWebsite" name="website" class"form-control" placeholder="website" value="'+temp+'"></div>');
      $('#cuPhone').append('<div class="form-group"><input id="savePhone" name="phone" class"form-control" placeholder="phone" value="'+temp1+'"></div>');
      $('#cuName').append('<div class="form-group"><input id="saveFirstname" name="firstname" class"form-control" placeholder="firstname" value="'+temp2a+'"></div>');
      $('#cuName').append('<div class="form-group"><input id="saveLastname" name="lastname" class"form-control" placeholder="lastname" value="'+temp2+'"></div>');
      $('#cuDescTitle').append('<div class="form-group"><input id="saveDescTitle" name="descTitle" class"form-control" placeholder="Fill in your headline..." value="'+temp3+'"></div>');
      $('#cuDesc').append('<div class="form-group"><textarea id="saveDesc" name="describe" class"form-control">'+temp4+'</textarea></div>');

      $('#editCurrentProfile').toggle();
      $('#editCurrentProfileSave').toggle();
  });
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $('#editCurrentProfileSave').click(function(){
      var git = $('#saveGithub').val();
      var web = $('#saveWebsite').val();
      var phone = $('#savePhone').val();
      var fname = $('#saveFirstname').val();
      var lname = $('#saveLastname').val();
      var descTitle = $('#saveDescTitle').val();
      var desc = $('#saveDesc').val();
      console.log(git);
      console.log(web);
      console.log(phone);
      console.log(fname);
      console.log(lname);
      console.log(descTitle);
      console.log(desc);
      
      var post = $.post('saveProfile',{_token: CSRF_TOKEN, github:git, website:web, phone:phone, firstname:fname, lastname:lname, descTitle:descTitle,describe:desc},function(res){
          $('#cuGithub').empty().append('<span style="font-size: 12px">'+res.github+'</span>');
          $('#cuWebsite').empty().append('<span style="font-size: 12px">'+res.website+'</span>');
          $('#cuPhone').empty().append('<span style="font-size: 12px">'+res.phone+'</span>');
          $('#cuName').empty().text(res.lastname+", "+res.firstname);
          $('#cuDescTitle').empty().text(res.descTitle);
          $('#cuDesc').empty().text(res.describe);

          $('#editCurrentProfile').toggle();
          $('#editCurrentProfileSave').toggle();
      });
  });

  $('#fillProject').ready(function(){
      $.get('ptype_select',function(res){
          console.log("fillProject");
          console.log(res)
          for (var i = 0; i < res.length; i+=1) {
              $('#projectType_select').append('<option value="'+res[i].id+'">'+res[i].type_name+'</option>');
          }
      });
      console.log("hehe")
      console.log(skill_tags);
      $('#makeProjectSkill').autocomplete({
          source:skill_tags
      });
  });
});