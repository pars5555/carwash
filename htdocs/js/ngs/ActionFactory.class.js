ngs.ActionFactory = Class.create();
ngs.ActionFactory.prototype={

	initialize: function(ajaxLoader){
		this.actions = [];
       this.actions["reset_device_counter"] = function temp(){return new ngs.ResetDeviceCounterAction("reset_device_counter", ajaxLoader);};
       this.actions["restart_device"] = function temp(){return new ngs.RestartDeviceAction("restart_device", ajaxLoader);};
       this.actions["set_device_passcode"] = function temp(){return new ngs.SetDevicePasscodeAction("set_device_passcode", ajaxLoader);};
       this.actions["charge_device"] = function temp(){return new ngs.ChargeDeviceAction("charge_device", ajaxLoader);};

        //admin
       // this.actions["admin_add_user"] = function temp(){return new ngs.AdminAddUserAction("admin_add_user", ajaxLoader);};
        },

	getAction: function(name){
		return this.actions[name]();
	}
};