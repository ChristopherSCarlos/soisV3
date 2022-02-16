$(document).ready(function(){
  $(".HPLatestNews").click(function(){
    // $("#div1").fadeIn();
    // $("#div2").fadeIn("slow");
    $("#homepageLatestNewsDiv").fadeIn(3000);
    $("#homepageFeaturedNewsDiv").fadeOut(3000);
  });
});

$(document).ready(function(){
  $(".HPFeaturedNews").click(function(){
    // $("#div1").fadeIn();
    // $("#div2").fadeIn("slow");
    $("#homepageLatestNewsDiv").fadeOut(3000);
    $("#homepageFeaturedNewsDiv").fadeIn(3000);
  });
});