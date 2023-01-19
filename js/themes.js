$(document).ready(function () {
  //slider ============================
  $(".js-slider").slick({
    infinite: true,
    arrows: false,
    speed: 800,
    fade: true,
    cssEase: "linear",
    autoplay: true,
  });
  //Tabs - Tabs Content ===============
  $(".c-tabs li").click(function () {
    var item = $(this);
    var showContent = item.data("content");
    var activeColor = item.data("color");

    item.addClass("active");
    item.css({
      "background-color": activeColor,
      "border-top-color": activeColor,
    });

    $(".c-tabs li").not(item).removeClass("active");
    $(".c-tabs li").not(item).css("background-color", "");

    $("#" + showContent).fadeIn();
    $(".c-listpost")
      .not("#" + showContent)
      .hide();
  });
  var pathname = window.location.pathname;
  if (pathname.includes("confirm")) {
    $(".c-btn__contact").css("display", "none");
  } else {
    $(".c-btn__contact").css("display", "flex");
  }
  $(".c-btn--clear input").click(function () {
    $(":input").not(":button, :submit, :reset, :hidden").val("");
  });
  $("#serviceSearch .chkbutton").click(function () {
    var choices = {};
    var form = $("#serviceSearch");
    $(".c-column__item").remove();
    $(".c-column").empty();

    $("input[type=checkbox]:checked").each(function () {
      if (!choices.hasOwnProperty(this.name)) choices[this.name] = [this.value];
      else choices[this.name].push(this.value);
    });
    $.ajax({
      url: form.data("url"),
      type: "POST",
      data: {
        action: "call_post",
        choices: choices,
      },
      success: function (result) {
        $(".c-column").append(result);
        // console.log(result);
      },
      error: function (err) {
        console.log(err);
      },
    });
  });
  function cvf_load_all_posts(page) {
    var form = $("#serviceSearch");
    $(".c-listpost__item").remove();
    $.ajax({
      url: form.data("url"),
      type: "POST",
      data: {
        action: "demo-pagination-load-posts",
        page: page,
      },
      success: function (result) {
        $(".c-listpost").append(result);
        // console.log(result);
      },
      error: function (err) {
        console.log(err);
      },
    });
  }
  // cvf_load_all_posts(1);
  $(".c-pagination a").click(function () {
    var page = $(this).text();
    console.log(page);
    cvf_load_all_posts(page);
  });
});
$(document.body).trigger("call_post");
