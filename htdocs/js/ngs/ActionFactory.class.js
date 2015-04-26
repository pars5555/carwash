ngs.ActionFactory = Class.create();
ngs.ActionFactory.prototype={

	initialize: function(ajaxLoader){
		this.actions = [];
       this.actions["reset_device_counter"] = function temp(){return new ngs.ResetDeviceCounterAction("reset_device_counter", ajaxLoader);};
       this.actions["restart_device"] = function temp(){return new ngs.RestartDeviceAction("restart_device", ajaxLoader);};
       this.actions["set_device_passcode"] = function temp(){return new ngs.SetDevicePasscodeAction("set_device_passcode", ajaxLoader);};
       this.actions["update_devices_info"] = function temp(){return new ngs.UpdateDevicesInfoAction("update_devices_info", ajaxLoader);};
       this.actions["charge_device"] = function temp(){return new ngs.ChargeDeviceAction("charge_device", ajaxLoader);};
       

        //admin
       this.actions["admin_set_device_config_variable"] = function temp(){return new ngs.SetDeviceConfigVariableAction("admin_set_device_config_variable", ajaxLoader);};
       this.actions["admin_update_devices_info"] = function temp(){return new ngs.AdminUpdateDevicesInfoAction("admin_update_devices_info", ajaxLoader);};
       this.actions["admin_update_device_firmware"] = function temp(){return new ngs.AdminUpdateDeviceFirmwareAction("admin_update_device_firmware", ajaxLoader);};
        },

	getAction: function(name){
		return this.actions[name]();
	}
};