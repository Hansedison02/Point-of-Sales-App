$(document).ready(function(){
    // Activate Carousel
    $("#ASCarousel").carousel();

    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#ASCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#ASCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#ASCarousel").carousel(2);
    });
    $(".item4").click(function(){
        $("#ASCarousel").carousel(3);
    });

    // Enable Carousel Controls
    $(".left").click(function(){
        $("#ASCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#ASCarousel").carousel("next");
    });
});
