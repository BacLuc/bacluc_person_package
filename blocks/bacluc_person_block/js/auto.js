(function ($) {
    "use strict";
    var datefields = $(".datepickerdiv").find("input");
    if (datefields.length > 0) {
        datefields.on('changeDate', function (e) {
            var changed = this;
            $(".datepickerdiv").find("input").each(function () {
                if (this === changed) {

                } else {
                    if ($(this).val().length == 0) {
                        $(this).val($(changed).val());
                    }
                }
            });
        })
    }
})(jQuery)