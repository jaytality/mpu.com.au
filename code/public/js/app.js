$(".mpu-dropdown-toggle").click(function(e) {
    e.preventDefault();
    e.stopPropagation();

    let toggleMenu = $(this).data("toggle");

    // hide everything first
    $("div[class^='dropdown-']").hide();

    $(".dropdown-content").show();
    $("." + toggleMenu).show();
});

$(document).click(function() {
    $(".dropdown-content").hide();
    $("div[class^='dropdown-']").hide();
});