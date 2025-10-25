$(document).ready(function () {
    $(window).on("scroll", function () {
        if ($(window).scrollTop() > 0) {
            $("header").addClass(
                "backdrop-blur-sm bg-white border-b border-gray-200"
            );
            $(".navigation .top-direction")
                .addClass("block")
                .removeClass("hidden");
        } else {
            $("header").removeClass(
                "backdrop-blur-sm bg-white border-b border-gray-200"
            );
            $(".navigation .top-direction")
                .addClass("hidden")
                .removeClass("block");
        }
    });

    $(document).on("click", ".navigation .top-direction", function () {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });

    let navItem = $(".nav-items div");

    for (let index = 0; index < navItem.length; index++) {
        $(navItem[index]).on("click", function () {
            const $targetTabs = $(
                `.nav-items-submenus-tab:eq(${index}), .nav-items-submenus:eq(${index})`
            );

            const isOpen = !$targetTabs.first().hasClass("hidden");

            $(".nav-items-submenus-tab, .nav-items-submenus").addClass(
                "hidden"
            );

            if (!isOpen) {
                $targetTabs.removeClass("hidden");
            }
        });
    }

    setTimeout(() => {
        $(this).find(".success-popup, .error-popup").fadeOut();
    }, 2500);

    $(".main-view-content").slick({
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
    });
});
