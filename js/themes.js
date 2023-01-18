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

  $("#serviceSearch .chkbutton").click(function () {
    var choices = {};

    $(".contents").remove();
    $(".filter-output").empty();

    $("input[type=checkbox]:checked").each(function () {
      if (!choices.hasOwnProperty(this.name)) choices[this.name] = [this.value];
      else choices[this.name].push(this.value);
    });
    console.log(choices);
    $.ajax({
      url: ajax_object.ajax_url,
      type: "POST",
      data: {
        action: "call_post",
        choices: choices,
      },
      success: function (result) {
        $(".filter-output").append(result);
        // console.log(result);
      },
      error: function (err) {
        console.log(err);
      },
    });
  });
});
$(document.body).trigger("post-load");
