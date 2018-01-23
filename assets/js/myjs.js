$('.sidenav#nav1 li > a').click(function() {
  $('.sidenav#nav1 li').removeClass('active');
  $(this).parent().addClass('active');
});