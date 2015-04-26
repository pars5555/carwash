ngs.AdminDevicesLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
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
        return "admin_devices";
    },
    afterLoad: function () {
        this.updatePage();
        this.initSetStatisticsPagePasscodeButtons();
        this.initUpdateDeviceButtons();
    },
    updatePage: function () {
        var self = this;
        window.setTimeout(function () {
            ngs.action('admin_update_devices_info', {});
            self.updatePage();
        }, 1000);
    },
    initSetStatisticsPagePasscodeButtons: function () {
        jQuery('.f_device_actions').click(function () {
            var device_id = jQuery(this).attr('device_id');
            ngs.load('admin_device_actions_popup', {device_id: device_id});
        });
        
    },
    initUpdateDeviceButtons:function(){
        jQuery('.f_device_update_buttons').click(function () {
            var device_id = jQuery(this).attr('device_id');
            ngs.load('admin_device_update_popup', {device_id: device_id});
        });
    }
});
