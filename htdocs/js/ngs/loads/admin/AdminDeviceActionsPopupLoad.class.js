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
        var deviceId = this.params.device_id;
        jQuery(".f_save_btn").click(function () {
            var varName = jQuery(this).parent().find("input:hidden").val();
            var varValue = jQuery(this).parent().find("input:text").val();
            ngs.action('admin_set_device_config_variable', {variable_name: varName, 'value': varValue, 'device_id': deviceId});
        });
    }
});
