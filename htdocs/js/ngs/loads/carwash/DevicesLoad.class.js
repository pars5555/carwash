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
        this.initSetStatisticsPagePasscodeButtons();
        this.updatePage();

    },
    updatePage: function () {
        window.setTimeout(function () {
            ngs.load('devices', {});
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

    },
    initSetStatisticsPagePasscodeButtons: function () {
        jQuery('.f_set_statistics_page_passcode').click(function () {
            jQuery('#savePassBtn').css({'display':"block"});
            var deviceId = jQuery(this).attr('device_id');
            jQuery('#passcode_device_id').val(deviceId);
            var currentPasscode = jQuery(this).attr('statistics_page_passcode');
            var i = 0;
            jQuery('#deviceStatisticsPascodeModal .f_modal_content').find('select').each(function () {
                jQuery(this).val(currentPasscode[i++]);
            });
            jQuery("#deviceStatisticsPascodeModal .f_modal_content").addClass("active");
            jQuery("#deviceStatisticsPascodeModal").removeClass("hide");
            jQuery("#deviceStatisticsPascodeModal .close_button,#deviceStatisticsPascodeModal .overlay").click(function () {
                jQuery("#deviceStatisticsPascodeModal .f_modal_content").removeClass("active");
                jQuery("#deviceStatisticsPascodeModal").addClass("hide");
            });
        });

        jQuery(".overlay").click(function () {
            jQuery(this).parent().addClass("hide");
        });

    }
});
