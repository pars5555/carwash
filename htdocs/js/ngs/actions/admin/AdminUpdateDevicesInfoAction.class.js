ngs.AdminUpdateDevicesInfoAction = Class.create(ngs.AbstractAction, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "carwash", ajaxLoader);
    },
    getUrl: function () {
        return "do_admin_update_devices_info";
    },
    getMethod: function () {
        return "POST";
    },
    beforeAction: function () {
    },
    afterAction: function (transport) {
        var data = transport.responseText.evalJSON();
        if (data.status === "ok") {
            jQuery(data.devices).each(function () {
                var device = this;
                var deviceId = device.id;
                var title  = device.title;
                var totalAmd = device.totalAmd;
                var status = device.status;
                jQuery('#device_total_amd_' + deviceId).html(totalAmd);
                jQuery('#device_title_' + deviceId).html(title);
                jQuery('#device_status_' + deviceId).html(status);
                jQuery('#device_action_buttons_' + deviceId).css({'display': status === 'off' ? 'none' : 'block'});
            });
        } else if (data.status === "err") {

        }
    }
});
