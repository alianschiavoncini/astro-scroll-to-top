jQuery( document ).ready(function( $ ) {

    /**
     * Scroll to top function: add/remove the CSS class to show/hide the button
     */
    function astro_scroll_to_top() {
        // Value in px of the distance to be scrolled for the 'scroll-to-top' button to show up
        if ($(window).scrollTop() > 500) {
            $(".astro_stt_button").addClass("active");
        } else {
            $(".astro_stt_button").removeClass("active");
        }
    }

    /**
     * Show and hide the Scroll To Top button
     */
    astro_scroll_to_top();
    $(window).on("scroll", astro_scroll_to_top);

    /**
     * Scroll to top when the button is clicked
     */
    $(".astro_stt_button").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1);
        return false;
    });

});
