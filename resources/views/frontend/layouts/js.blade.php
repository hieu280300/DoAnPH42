
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
    $( "#slider-range" ).slider({
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
    function up(max) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    if (document.getElementById("myNumber").value >= parseInt(max)) {
        document.getElementById("myNumber").value = max;
    }
}
function down(min) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
    if (document.getElementById("myNumber").value <= parseInt(min)) {
        document.getElementById("myNumber").value = min;
    }
}

    </script>
    <script>
      function updateCart(qty,rowId)
      {
       
      }
      </script>
    <script>
//       function addtocart(){ 
// get 'sid' and 'parent' value from anchor tag using jquery

// $.ajax({

//     type: 'POST',

//     url: '/cart/add.php',

//     data:{  'sid':sid, 'parent':parent  }

// success : function(data) {  alert('success'); }
// }); 
//  }
    function addtocard(event)
    {
      event.preventDefault();
      let urlCart =$(this).data('url');
      alert(urlCart);
      // alert(urlCart);
      // $.ajax({
      //   type: "GET",
      //   url: urlCart,
      //   dataType: 'json',
      //   success: function (data)
      //   {
         
      //   }
      //     error: function(){
            
      //     }
      //   });
     }
    $(function(){
      $('.add_to_cart').on('click', addtocard);
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
<!--Opacity & Other IE fix for older browser-->
<!--[if lte IE 8]>
    <script type="text/javascript" src="js/ie-opacity-polyfill.js"></script>
<![endif]-->
<script src="/js/frontend/main.js"></script>