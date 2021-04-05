;(function ($) {

	$.fn.lockScreen = function(obj) {

		$(this).click(function() {

			var id = $("#" + obj).val();
			if (id != "") {
				var divTag = $('<div />').attr("id", "lock");

				divTag.css("z-index"         , "999")
				      .css("position"        , "absolute")
				      .css("top"             , "0px")
				      .css("left"            , "0px")
				      .css("width"           , $(document).width())
				      .css("height"          , $(document).height())
				      .css("background-color", "#ffffff")
				      .css("opacity"         , "0.6");

				$('body').append(divTag);

				$(window).on('resize.lock', function() {
					divTag.css({
						width: $(document).width(),
						height: $(document).height()
					});
				});
			}
		});
	};


})(jQuery);
