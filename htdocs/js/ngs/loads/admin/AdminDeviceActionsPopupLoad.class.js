ngs.AdminDeviceActionsPopupLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "device_actions_popup";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "admin_device_actions_container";
    },
    getName: function () {
        return "admin_device_action_popups";
    },
    afterLoad: function () {
        jQuery("#adminDeviceActionsPopupModal .close_button,#adminDeviceActionsPopupModal .overlay").click(function () {
            jQuery("#adminDeviceActionsPopupModal").remove();
        });
    }
});
