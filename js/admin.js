$(document).ready(function () {
  $(".tab_box button").click(function () {
    var index = $(this).index();
    $(".tab_box button").removeClass("on");
    $(this).addClass("on");
    $(".panel").hide();
    $(".panel").eq(index).show();
  });
  $(".tab_box button").eq(3).trigger("click");

  $(".list #txt_len b").click(function () {
    $(this).toggleClass("on");
    if ($(this).hasClass("on")) {
      $(this).parent().siblings(".slide_txt").slideDown("fast");
      $(this).find("i").attr("class", "fa fa-angle-up");
    } else {
      $(this).parent().siblings(".slide_txt").slideUp("fast");
      $(this).find("i").attr("class", "fa fa-angle-down");
    }
  });
  //cutting long text
  var cuttingText = function () {
    var winWidth = $(window).width();
    for (var i = 0; i < $(".list").length; i++) {
      var txt_length = $(".list").eq(i).find("#txt_len p").text();
      if (txt_length.length > 30) {
        $(".list")
          .eq(i)
          .find("#txt_len p")
          .text(txt_length.substr(0, 30) + "...");
      } else {
        txt_length;
      }
    }
  };
  cuttingText();

  //   $(".panel_box .list li b").click(function () {
  //     $(this).toggleClass("on");
  //     if ($(this).hasClass("on")) {
  //       $(this).parent().siblings().find("#txt_len").slideDown("fast");
  //     } else {
  //       $(this).parent().siblings().find("#txt_len").slideUp("fast");
  //     }
  //   });
});
