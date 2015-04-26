ngs.AdminUpdateDeviceFirmwareAction = Class.create(ngs.AbstractAction, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "do_update_device_firmware";
    },
    getMethod: function () {
        return "POST";
    },
    beforeAction: function () {
    },
    afterAction: function (transport) {
        var data = transport.evalJSON();
        console.log(data);
        if (data.status === "ok") {
            jQuery("#adminDeviceUpdatePopupModal").remove();
        } else if (data.status === "err") {
            jQuery('#device_update_error_message').html(data.message);
        }
    }
});
