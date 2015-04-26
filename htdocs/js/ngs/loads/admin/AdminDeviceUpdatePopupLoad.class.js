ngs.AdminDeviceUpdatePopupLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "device_update_popup";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "admin_device_update_container";
    },
    getName: function () {
        return "admin_device_update_popups";
    },
    afterLoad: function () {
        jQuery("#adminDeviceUpdatePopupModal .close_button,#adminDeviceUpdatePopupModal .overlay").click(function () {
            jQuery("#adminDeviceUpdatePopupModal").remove();
        });
    }
});
