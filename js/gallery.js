$(document).ready(function () {
  var count = 10;
  var addData = 0;
  var allData = [];
  var filteredData = [];

  // masonry library function
  $(".gallery_box").masonry({
    // set itemSelector so .grid-sizer is not used in layout
    itemSelector: ".gallery_item",
    // use element for option
    columnWidth: ".grid-sizer",
    percentPosition: true,
  });

  $.getJSON("/onetel/data/images.json", initGallery);

  function initGallery(data) {
    allData = data;
    filteredData = allData;

    addItems();

    $("#load_more").on("click", addItems);
    $(".filtering>button").on("click", filterItems);
  }

  function addItems(filter) {
    var items = [];
    var sliced = filteredData.slice(addData, addData + count);
    $.each(sliced, function (i, item) {
      var itemHTML =
        '<div class="gallery_item ' +
        item.category +
        '">' +
        '<img src="images/gallery/' +
        item.thumb +
        '" alt="' +
        item.title +
        '">' +
        "<span>" +
        '<a href="images/gallery/' +
        item.large +
        '" class="venobox" data-gall="myGallery">' +
        "+" +
        "</a>" +
        "</span>" +
        "</div>";
      items.push($(itemHTML).get(0));
    });

    $(".gallery_box").append(items);

    $(".gallery_box").imagesLoaded(function () {
      $(items).removeClass("is-loading");
      $(".gallery_box").masonry("appended", items);
      if (filter) {
        $(".gallery_box").masonry();
      }
    });

    //venobox effect
    // venobox library lightbox function
    $(".venobox").venobox();

    $(".filtering button").click(function (e) {
      e.preventDefault();
      $(".filtering button").removeClass("on");
      $(this).addClass("on");
    });

    // // init Isotope
    // var $grid = $('.gallery_box').isotope({
    //   // options
    // });
    // // filter items on button click
    // $('.filtering').on('click', 'button', function () {
    //   var filterValue = $(this).attr('data-filter');
    //   $grid.isotope({ filter: filterValue });
    // });

    addData += sliced.length;
    if (addData < filteredData.length) {
      $("#load_more").show();
    } else {
      $("#load_more").hide();
    }
  }

  function filterItems() {
    var key = $(this).attr("data-filter");

    masonryItems = $(".gallery_box").masonry("getItemElements");
    $(".gallery_box").masonry("remove", masonryItems);

    filteredData = [];
    addData = 0;

    if (key === "all") {
      filteredData = allData;
    } else {
      filteredData = $.grep(allData, function (item) {
        return item.category === key;
      });
    }
    addItems(true);
  }

  // $("#load_more").on("click", function () {
  //   var winHeight = $(window).height();
  //   var bottom = $(".gallery_box").height();
  //   console.log(bottom);
  //   $("html,body").animate({ scrollTop: bottom }, 300);
  // })

  //image upload function
});
