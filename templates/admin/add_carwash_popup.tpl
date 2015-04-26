<div class="modal hide" id="adminAddCarwashPopupModal">
    <div class="overlay"></div>
    <div class="modal-content f_modal_content active">
        <button class="close_button"></button>
        <div class="modal-body">
            <form autocomplete="off" action="{$SITE_PATH}/dyn/admin/do_add_edit_carwash">
                <input type="hidden" id="editing_carwash_id" name="carwash_id"/>

                <div class="form-group">
                    <label class="input_label label inline-block">Carwash Title</label>
                    <input class="text" type="text" name="title"/>
                </div>
                <div class="form-group">
                    <label class="input_label label inline-block" >Login</label>
                    <input class="text" type="text" name="login"/>
                </div>
                <div class="form-group">
                    <label class="input_label label inline-block">Password</label>
                    <input class="text" type="text" name="password"/>
                </div>
                <button type="submit" class="button blue inline-block">Save</button>
            </form>
        </div>
    </div>
</div>