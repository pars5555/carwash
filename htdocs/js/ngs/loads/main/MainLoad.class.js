ngs.MainLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "main", ajaxLoader);
    },
    getUrl: function () {
        return "main";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "content";
    },
    getName: function () {
        return "main";
    },
    afterLoad: function () {
        ngs.nestLoad(jQuery("#contentLoad").val(), {});
        this.initSetStatisticsPagePasscodeButtons();
    },
    initSetStatisticsPagePasscodeButtons: function () {

        jQuery('#savePassBtn').click(function () {
            jQuery(this).css({'display':"none"});
            var passcode = "";
            jQuery('#deviceStatisticsPascodeModal .f_modal_content').find('select').each(function () {
                var buttonIndex = jQuery(this).val();
                passcode += buttonIndex;
            });
            var deviceId = jQuery('#passcode_device_id').val();
            ngs.action('set_device_passcode', {'passcode': passcode, 'device_id': deviceId});
            window.setTimeout(function () {
                jQuery("#deviceStatisticsPascodeModal .f_modal_content").removeClass("active");
                jQuery("#deviceStatisticsPascodeModal").addClass("hide");
            }, 5000);
        });


    }



});
