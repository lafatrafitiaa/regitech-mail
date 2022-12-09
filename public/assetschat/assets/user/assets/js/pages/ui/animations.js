$(document).ready(function() {
  $(".img-animate").hover(function() {
    var anim = $(this).attr("data-animation");
    $(this).addClass("animated");
    $(this).addClass(anim);
    setTimeout(function() {
      $(".img-animate").removeClass(anim);
    }, 3000);
  });
});
