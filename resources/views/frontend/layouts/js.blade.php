
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
    $( ".slider-range" ).slider({
      range: true,
      min: 150,
      max: 1500,
      values: [ 520, 1100 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  
  </script>
    <script>
      var myIndex = 0;
      carousel();
      
      function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
        x[myIndex-1].style.display = "block";  
        setTimeout(carousel, 2000); // Change image every 2 seconds
      }
      </script>
    <script>
      function updateCart(qty,rowId){
        $.get(
          '{{asset('/update')}}',
          {qty:qty,rowId:rowId},
          function(){
            location.reload();
          }
        )
      }
    </script>
    <script>
      $(document).ready(function () {
  // MDB Lightbox Init
  $(function () {
    $("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
  });
});
      </script>

<script src="/js/frontend/owl.carousel.min.js"></script>
<script src="/js/frontend/lightbox.min.js"></script>
<script src="/js/frontend/jquery.elevatezoom.js"></script>
<script src="/js/frontend/jquery.bxslider.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
     $('.slider8').bxSlider({
        mode: 'vertical',
        slideWidth: 300,
        minSlides: 3,
        slideMargin: 10
      });
     $('.slider9').bxSlider({
        mode: 'vertical',
        slideWidth: 300,
        minSlides: 3,
        slideMargin: 10
      });
     $('.slider10').bxSlider({
        mode: 'vertical',
        slideWidth: 300,
        minSlides: 3,
        slideMargin: 10
      });
    });
</script>


<script src="/js/frontend/bootstrap-select.min.js"></script>
<script src="/js/frontend/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="/js/frontend/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="/js/frontend/rs-plugin/rs.home.js"></script>
<script src="/js/frontend/bootstrap.min.js"></script>
<script src="/js/frontend/cart-info.js"></script>
<!--Opacity & Other IE fix for older browser-->
<!--[if lte IE 8]>
    <script type="text/javascript" src="js/ie-opacity-polyfill.js"></script>
<![endif]-->
<script src="/js/frontend/main.js"></script>