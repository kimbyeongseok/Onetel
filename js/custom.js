$(document).ready(function () {
  //var winWidth = $(window).width() *0.3;
  $(".main_img").height($(window).width() * 0.35);
  $(".sub_img").height($(window).width() * 0.4);

  var wrapHeight = $(window).height();
  var windowWid = $(window).width();
  var topHeight = $(".top_line").outerHeight();
  var footerHeight = $("footer").outerHeight();
  var totalMinus = topHeight + footerHeight;
  if (windowWid < 700) {
    $(".sub_section").outerHeight(wrapHeight - totalMinus);
  }

  $(window).resize(function () {
    var winWidth = $(window).width() * 0.3;
    var sub_img = $(window).width() * 0.37;
    $(".main_img").height(winWidth);
    $(".sub_img").height(sub_img);
    //    alert(winWidth);
  });

  //menu icon click event
  $(".nav_icon").click(function () {
    $(this).toggleClass("on");
    if ($(this).hasClass("on")) {
      $(".gnb").slideDown("slow");
    } else {
      $(".gnb").slideUp("slow");
    }
  });

  //header stick when mouse scrolling down
  let hedTop = $("header").offset().top;
  $(window).scroll(function () {
    let scroll = $(window).scrollTop();
    if (scroll >= hedTop) {
      $("header").addClass("scroll");
    } else {
      $("header").removeClass("scroll");
    }
  });

  $(".gnb li").click(function () {
    let valuePos = $(this).find("a").attr("value");
    let offsetTop = $("#" + valuePos).offset().top;
    //alert(valuePos);
    $("html,body").animate({ scrollTop: offsetTop - 70 }, 500);
  });

  //cutting long text
  var cuttingText = function () {
    for (var i = 0; i < $(".port_con, .content").length; i++) {
      var txt_length = $(".port_con, .content").eq(i).find("p").text();
      if (txt_length.length > 80) {
        $(".port_con, .content")
          .eq(i)
          .find("p")
          .text(txt_length.substr(0, 80) + "...");
      } else {
        txt_length;
      }
    }
  };
  cuttingText();

  //project load more
  var loadMore = function () {
    $(".content").hide();
    $(".content").slice(0, 6).show();

    $(".load_more").on("click", function () {
      $(".content:hidden").slice(0, 3).show();
      if ($(".content:hidden").length === 0) {
        $(".more").hide();
        $(".fold").show();
      }
    });
    $(".fold").click(function () {
      var contentLen = $(".content").length;
      $(".content").slice(6, contentLen).slideUp("fast");
      $(".fold").hide();
      $(".more").show();
    });
  };
  loadMore();
});
