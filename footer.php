<?php
/**
* Footer template — все JS инициализации и закрывающий HTML
*/
?>

<script>
 $(document).ready(function () {
   $(document).on('click', '.modal_btn', function () {
     $('#big-modal').arcticmodal();
   });
   $(document).on('click', '.modal_btn2', function () {
     $('#big-modal2').arcticmodal();
   });
   $(document).on('click', '.modal_btn3', function () {
     $('#big-modal3').arcticmodal();
   });
   $(document).on('click', '.modal_btn4', function () {
     $('#big-modal4').arcticmodal();
   });
 });

 $(window).scroll(function () {
   if ($(document).scrollTop() > 50) {
     $('.cd-auto-hide-header').addClass('animate');
   } else {
     $('.cd-auto-hide-header').removeClass('animate');
   }
 });

 // Маска телефона
 (function ($) {
   $(function () {
     $('#phone,#phone2,#phone3,#phone4').inputmask('+7(999) 999-99-99');
   });
 })(jQuery);

 // data-src -> src
 [].forEach.call(document.querySelectorAll('img[data-src]'), function (img) {
   img.setAttribute('src', img.getAttribute('data-src'));
   img.onload = function () {
     img.removeAttribute('data-src');
   };
 });

 // Owl Carousel
 jQuery(document).ready(function ($) {
   var owl = $('.slide2');
   if (owl.length) {
     owl.owlCarousel({
       items: 1,
       mouseDrag: true,
       touchDrag: true,
       lazyLoad: true,
       nav: false,
       dots: false,
       loop: true,
       autoplay: true,
       center: true,
       autoHeight: false,
       margin: 10,
       autoplayTimeout: 4000,
       autoplayHoverPause: false,
       responsiveClass: false,
       autoWidth: true,
       responsive: {
         0: { items: 1, margin: 10 },
         700: { items: 1, margin: 10 },
         1000: { items: 1 },
       },
     });
   }
 });

 // Дата акции (завтрашний день)
 function updatePromoDate() {
   var currentDate = new Date();
   currentDate.setDate(currentDate.getDate() + 1);
   var formattedDate = currentDate.toLocaleDateString('ru-RU');
   var el1 = document.getElementById('promo-date');
   var el2 = document.getElementById('promo-date2');
   if (el1) el1.textContent = formattedDate;
   if (el2) el2.textContent = formattedDate;
 }
 updatePromoDate();

 // Плавный скролл по якорям
 jQuery(document).ready(function ($) {
   $('a[href^="#"]').on('click', function (e) {
     e.preventDefault();
     var targetId = $(this).attr('href');
     var $target = $(targetId);
     if ($target.length) {
       $('html, body').animate({ scrollTop: $target.offset().top - 120 }, 1000);
     }
   });
 });
</script>

<?php wp_footer(); ?>
</body>
</html>
