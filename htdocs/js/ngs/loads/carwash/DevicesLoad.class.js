ngs.DevicesLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "carwash", ajaxLoader);
    },
    getUrl: function () {
        return "devices";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "content";
    },
    getName: function () {
        return "devices";
    },
    afterLoad: function () {
        jQuery('.f_reset_device_counter').click(function () {
            var resetButton = jQuery(this);
            resetButton.addClass('hide');
            var deviceId = resetButton.attr('device_id');
            window.setTimeout(function () {
                resetButton.removeClass('hide');
            }, 5000);
            ngs.action("reset_device_counter", {"device_id": deviceId});

        });
    }
});
