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
        return "main_content";
    },
    getName: function () {
        return "devices";
    },
    afterLoad: function () {
        this.initResetDeviceCounterButtons();
        this.initRestartDeviceButtons();
        this.initChargeDeviceButtons();
        this.updatePage();

    },
    updatePage: function () {
        window.setTimeout(function () {
            // ngs.load('devices', {});
        }, 3000);

    },
    initResetDeviceCounterButtons: function () {
        jQuery('.f_reset_device_counter').click(function () {
            var deviceId = jQuery(this).attr('device_id');
            ngs.action("reset_device_counter", {"device_id": deviceId});
        });

    },
    initRestartDeviceButtons: function () {
        jQuery('.f_restart_device').click(function () {
            var deviceId = jQuery(this).attr('device_id');
            ngs.action("restart_device", {"device_id": deviceId});
        });
    },
    initChargeDeviceButtons: function () {
        jQuery('.f_charge_device').click(function () {
            var deviceId = jQuery(this).attr('device_id');
            ngs.action("charge_device", {"device_id": deviceId});
        });

    }
});
