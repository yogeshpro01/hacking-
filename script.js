$(document).ready(function() {
    $(window).scroll(function() {
        $(document).scrollTop() > 20 ? $(".header").addClass("header-color", 500) : $(".header").removeClass("header-color")
    })
})

 $(document).ready(function() {
 $(".hamburger").click(function(){
      $(".site-nav").toggleClass("site-nav-open",200)
       
  $(this).toggleClass("hamburgerActive");

});
})
 $(document).ready(function() {
 $(".nav-text").click(function(){
      $(".site-nav").removeClass("site-nav--open", 500)
       $('.hamburger').removeClass("hamburgerActive");
 

});
})
 $(document).ready(function() {
    $("a").on("click", function(e) {
        if ("" !== this.hash) {
            e.preventDefault();
            var a = this.hash;
            $("html, body").animate({
                scrollTop: $(a).offset().top
            }, 800, function() {
                window.location.hash = a
            })
        }
    })
});