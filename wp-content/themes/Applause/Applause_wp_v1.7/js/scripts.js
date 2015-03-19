jQuery( document ).ready( function( $ ) {

//Nice Scroll 
  $('html').niceScroll({
    //autohidemode: 'false',     // Do not hide scrollbar when mouse out
    cursorborderradius: '0px', // Scroll cursor radius
    background: '#E5E9E7',     // The scrollbar rail color
    cursorwidth: '10px',       // Scroll cursor width
    cursorcolor: '#999999'     // Scroll cursor color
  });
      
  $(window).load(function() {     
    parallaxInit(); 
  });

 //Scroll To Top
    $(document).ready(function ()
        { 
            var scrollTimeout;
            
            $('a.scroll-top').click(function(){
                $('html,body').animate({scrollTop:0},500);
                return false;
            });

            $(window).scroll(function(){
                clearTimeout(scrollTimeout);
                if($(window).scrollTop()>400){
                    scrollTimeout = setTimeout(function(){$('a.scroll-top:hidden').fadeIn()},100);
                }
                else{
                    scrollTimeout = setTimeout(function(){$('a.scroll-top:visible').fadeOut()},100);    
            }
            });
     }); 

//Parallax      
  function parallaxInit() {
    $('#home').parallax("30%", 0.1);
    //$('#status').parallax("30%", 0.1);
    //$('#another').parallax("30%", 0.1);
    //$('#wprocess').parallax("30%", 0.1);
    //$('#hire').parallax("30%", 0.1);
    //$('#twitter').parallax("30%", 0.1);
    //$('#parallax-1').parallax("30%", 0.1);
    //$('#parallax-2').parallax("30%", 0.1);
      /*add as necessary*/
  }


//prettyphoto
    jQuery("a[data-rel^='prettyPhoto']").prettyPhoto({hook: 'data-rel'});
    jQuery('a[data-rel]').each(function() {
      jQuery(this).attr('rel', $(this).attr('data-rel')).removeAttr('data-rel');
    });      

//Navigation Dropdown
  $('.nav a.colapse-menu1').click(function () { $(".nav-collapse").collapse("hide") });
  
  $('body').on('touchstart.dropdown', '.dropdown-menu', function (e) { e.stopPropagation(); });
  //onepage nav
      $('#navs').onePageNav({
        currentClass: 'active',
        filter: ':not(.external)',
        scrollThreshold: 0.25,
        scrollOffset: 30
      });
  //Sticky Nav
      $(".main-nav").sticky({ topSpacing: 0 });

  //tooltips
      $( 'body' ).tooltip({
        selector: "a[data-toggle=tooltip]"
      });
    //Photo Gallery
      $('#gallery-container').sGallery({
        fullScreenEnabled: true
      });


      //Contact From
    $(document).ready(function ()
    { 
     $('#submit').formValidator({
        scope: '#form'
      });
      
      $('#post-commentsss').formValidator({
        scope: '#comments-form'
      });
      
      $('#submit,#post-commentsss').click(function() {
            $('input.error-input, textarea.error-input').delay(300).animate({marginLeft:0},100).animate({marginLeft:10},100).animate({marginLeft:0},100).animate({marginLeft:10},100);
        });

      // Form plugin

      var options = {

        beforeSubmit: function() {
          $('.sending').show();

        },
        success: function() {
          $('.sending').hide();
          $('#form').hide();
          $(".mess").show().html('<h5>Thanks !</h5><h5>Your message has been sent.</h5>'); // Change Your message post send
          $('.mess').delay(3000).fadeOut(function() {

            $('#form').clearForm();
            $('#form').delay(3500).show();

          });
        }
      };
      

      $('#form').submit(function() {
        $(this).ajaxSubmit(options);
        return false;
      });
        
    });

}); 