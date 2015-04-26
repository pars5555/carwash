ngs.AdminCarwashesLoad = Class.create(ngs.AbstractLoad, {
    initialize: function ($super, shortCut, ajaxLoader) {
        $super(shortCut, "admin", ajaxLoader);
    },
    getUrl: function () {
        return "carwashes";
    },
    getMethod: function () {
        return "POST";
    },
    getContainer: function () {
        return "main_content";
    },
    getName: function () {
        return "admin_carwashes";
    },
    afterLoad: function () {
        jQuery('#adminAddCarwashPopupModal .close_button').click(function () {
            jQuery('#adminAddCarwashPopupModal').addClass('hide');
        });
        jQuery('#admin_add_carwash_btn').click(function () {
            jQuery('#adminAddCarwashPopupModal #editing_carwash_id').val(0);
            jQuery('#adminAddCarwashPopupModal').find("input[name='title']").val('');
            jQuery('#adminAddCarwashPopupModal').find("input[name='login']").val('');
            jQuery('#adminAddCarwashPopupModal').find("input[name='password']").val('');
            jQuery('#adminAddCarwashPopupModal').removeClass('hide');

        });
        this.initEditCarwash();
    },
    initEditCarwash: function () {
        jQuery('.f_admin_edit_carwash').click(function () {
            var carwashId = jQuery(this).attr('carwash_id');
            var title = jQuery(this).attr('carwash_title');
            var login = jQuery(this).attr('carwash_login');
            var password = jQuery(this).attr('carwash_password');
            jQuery('#adminAddCarwashPopupModal').find("input[name='title']").val(title);
            jQuery('#adminAddCarwashPopupModal').find("input[name='login']").val(login);
            jQuery('#adminAddCarwashPopupModal').find("input[name='password']").val(password);
            jQuery('#adminAddCarwashPopupModal #editing_carwash_id').val(carwashId);
            jQuery('#adminAddCarwashPopupModal').removeClass('hide');
        });
    }

});
