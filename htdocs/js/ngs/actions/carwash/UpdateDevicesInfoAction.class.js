ngs.UpdateDevicesInfoAction = Class.create(ngs.AbstractAction, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "carwash", ajaxLoader);
    },
    getUrl: function () {
        return "do_update_devices_info";
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
                var passcode = device.statisticsPagePasscode;
                var amd100_charge_seconds = device.amd100_charge_seconds;
                var amd200_charge_seconds = device.amd200_charge_seconds;
                var amd500_charge_seconds = device.amd500_charge_seconds;
                var resetCounterButton = device.resetCounterButton;
                jQuery('#amd100_charge_seconds_' + deviceId).val(amd100_charge_seconds);
                jQuery('#amd200_charge_seconds_' + deviceId).val(amd200_charge_seconds);
                jQuery('#amd500_charge_seconds_' + deviceId).val(amd500_charge_seconds);
                jQuery('#statistics_page_passcode_' + deviceId).val(passcode);
                jQuery('#reset_counter_button_' + deviceId).val(resetCounterButton);
                jQuery('#device_total_amd_' + deviceId).html(totalAmd);
                jQuery('#device_title_' + deviceId).html(title);
                jQuery('#device_status_' + deviceId).html(status);
                jQuery('#device_action_buttons_' + deviceId).css({'display': status === 'off' ? 'none' : 'block'});
            });
        } else if (data.status === "err") {

        }
    }
});
