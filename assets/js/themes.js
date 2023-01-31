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

    $("#" + showContent)
      .fadeIn()
      .addClass("active");
    $(".c-listpost")
      .not("#" + showContent)
      .removeClass("active")
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
    $(".p-service__result").empty();
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
        $(".p-service__result").append($(".c-column__item").length, [
          "件が該当しました",
        ]);
        // console.log(result);
      },
      error: function (err) {
        console.log(err);
      },
    });
  });

  $("body").on("click", ".pagination li a", function (e) {
    e.preventDefault();
    var paged = $(this).html();
    var url = $(".c-tabs__content").data("url");
    var listPost = $(".c-listpost.active");
    var cate = listPost.data("cat");
    var loading =
      '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
    $.ajax({
      type: "POST",
      url: url,
      data: {
        action: "load_data",
        paged: paged,
        cate: cate,
      },
      beforeSend: function () {
        listPost.empty();
        listPost.append(loading);
      },
      success: function (response) {
        listPost.empty();
        listPost.append(response.data.html);
        listPost.append(response.data.paged);
      },
      error: function (err) {
        console.log(err);
      },
    });
  });
  function next_prev(prev) {
    var currentPage = parseInt($(".pagination li.active").html());
    var url = $(".c-tabs__content").data("url");
    var listPost = $(".c-listpost.active");
    var cate = listPost.data("cat");
    var loading =
      '<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
    $.ajax({
      type: "POST",
      url: url,
      data: {
        action: "load_data",
        paged: prev ? currentPage - 1 : currentPage + 1,
        cate: cate,
      },
      beforeSend: function () {
        listPost.empty();
        console.log(currentPage);
        listPost.append(loading);
      },
      success: function (response) {
        listPost.empty();
        listPost.append(response.data.html);
        listPost.append(response.data.paged);
      },
      error: function (err) {
        console.log(err);
      },
    });
  }
  $("body").on("click", ".c-btn__prev", function (e) {
    next_prev(true);
  });
  $("body").on("click", ".c-btn__next", function (e) {
    next_prev(false);
  });
});
