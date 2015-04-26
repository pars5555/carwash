ngs.LoadFactory= Class.create();
ngs.LoadFactory.prototype={
	
    initialize: function(ajaxLoader){
        this.loads = [];
        this.loads["main"] = function temp(){return new ngs.MainLoad("main", ajaxLoader);};
        this.loads["home"] = function temp(){return new ngs.HomeLoad("home", ajaxLoader);};
        this.loads["devices"] = function temp(){return new ngs.DevicesLoad("devices", ajaxLoader);};


        //admin
        this.loads["admin_main"] = function temp(){return new ngs.AdminMainLoad("admin_main", ajaxLoader);};
        this.loads["admin_devices"] = function temp(){return new ngs.AdminDevicesLoad("admin_devices", ajaxLoader);};
        this.loads["admin_carwashes"] = function temp(){return new ngs.AdminCarwashesLoad("admin_carwashes", ajaxLoader);};
        this.loads["admin_device_actions_popup"] = function temp(){return new ngs.AdminDeviceActionsPopupLoad("admin_device_actions_popup", ajaxLoader);};
        this.loads["admin_device_update_popup"] = function temp(){return new ngs.AdminDeviceUpdatePopupLoad("admin_device_update_popup", ajaxLoader);};

    },

    getLoad: function(name){
            try{
                    return this.loads[name]();
            }
            catch(ex){
            }
    }
};