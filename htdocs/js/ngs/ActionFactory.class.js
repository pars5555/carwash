ngs.ActionFactory = Class.create();
ngs.ActionFactory.prototype={

	initialize: function(ajaxLoader){
		this.actions = [];
       this.actions["reset_device_counter"] = function temp(){return new ngs.ResetDeviceCounterAction("reset_device_counter", ajaxLoader);};

        //admin
       // this.actions["admin_add_user"] = function temp(){return new ngs.AdminAddUserAction("admin_add_user", ajaxLoader);};
        },

	getAction: function(name){
		return this.actions[name]();
	}
};