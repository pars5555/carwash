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
        this.initSetPricesButtons();
        this.initSetStatisticsPagePasscodeButtons();
        this.updatePage();
        this.refreshDeviceImages();
    },
    refreshDeviceImages: function () {
        window.setInterval(function () {
            jQuery('.devices_images').each(function () {
                var path = jQuery(this).attr('base_path');
                jQuery(this).attr('src', path + "?dummy=" + Date.now());
            });
        }, 1000);

    },
    updatePage: function () {
        var self = this;
        window.setTimeout(function () {
            ngs.action('update_devices_info', {});
            self.updatePage();
        }, 1000);

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
            jQuery('#savePassBtn').css({'display': "block"});
            var deviceId = jQuery(this).attr('device_id');
            jQuery('#passcode_device_id').val(deviceId);
            var currentPasscode = jQuery('#statistics_page_passcode_' + deviceId).val();
            var resetButton = jQuery('#reset_counter_button_' + deviceId).val();
            jQuery('#reset_counter_select').val(resetButton);
            var i = 0;
            jQuery('#deviceStatisticsPascodeModal .f_modal_content .f_passcode').find('select').each(function () {
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

        jQuery('#savePassBtn').click(function () {
            jQuery(this).css({'display': "none"});
            var passcode = "";
            jQuery('#deviceStatisticsPascodeModal .f_modal_content .f_passcode').find('select').each(function () {
                var buttonIndex = jQuery(this).val();
                passcode += buttonIndex;
            });
            var reset_button = jQuery('#reset_counter_select').val();
            var deviceId = jQuery('#passcode_device_id').val();
            ngs.action('set_device_passcode', {'passcode': passcode, 'reset_button': reset_button, 'device_id': deviceId});
            window.setTimeout(function () {
                jQuery("#deviceStatisticsPascodeModal .f_modal_content").removeClass("active");
                jQuery("#deviceStatisticsPascodeModal").addClass("hide");
            }, 3000);
        });

    },
    initSetPricesButtons: function () {
        jQuery('.f_set_prices').click(function () {
            jQuery(this).css({'display': "block"});
            var deviceId = jQuery(this).attr('device_id');
            jQuery('#set_price_device_id').val(deviceId);
            var amd100ChargeSeconds = jQuery('#amd100_charge_seconds_' + deviceId).val();
            var amd200ChargeSeconds = jQuery('#amd200_charge_seconds_' + deviceId).val();
            var amd500ChargeSeconds = jQuery('#amd500_charge_seconds_' + deviceId).val();
            jQuery("#amd100_charge_seconds").val(amd100ChargeSeconds);
            jQuery("#amd200_charge_seconds").val(amd200ChargeSeconds);
            jQuery("#amd500_charge_seconds").val(amd500ChargeSeconds);
            jQuery("#devicePricesModal .f_modal_content").addClass("active");
            jQuery("#devicePricesModal").removeClass("hide");
            jQuery("#devicePricesModal .close_button,#devicePricesModal .overlay").click(function () {
                jQuery("#devicePricesModal .f_modal_content").removeClass("active");
                jQuery("#devicePricesModal").addClass("hide");
            });
        });

        jQuery(".overlay").click(function () {
            jQuery(this).parent().addClass("hide");
        });

        jQuery('#savePricesBtn').click(function () {
            jQuery(this).css({'display': "none"});
            var deviceId = jQuery('#set_price_device_id').val();
            var amd100ChargeSeconds = jQuery('#amd100_charge_seconds').val();
            var amd200ChargeSeconds = jQuery('#amd200_charge_seconds').val();
            var amd500ChargeSeconds = jQuery('#amd500_charge_seconds').val();
            ngs.action('set_device_prices', {
                'amd100_charge_seconds': amd100ChargeSeconds,
                'amd200_charge_seconds': amd200ChargeSeconds,
                'amd500_charge_seconds': amd500ChargeSeconds,
                'device_id': deviceId});
            window.setTimeout(function () {
                jQuery("#devicePricesModal .f_modal_content").removeClass("active");
                jQuery("#devicePricesModal").addClass("hide");
            }, 3000);
        });

    }
});
