ngs.ChargeDeviceAction = Class.create(ngs.AbstractAction, {
    initialize: function($super, shortCut, ajaxLoader) {
        $super(shortCut, "carwash", ajaxLoader);
    },
    getUrl: function() {
        return "do_charge_device";
    },
    getMethod: function() {
        return "POST";
    },
    beforeAction: function() {
    },
    afterAction: function(transport) {
        var data = transport.responseText.evalJSON();
        if (data.status === "ok") {
            
        } else if (data.status === "err") {
            
        }
    }
});
