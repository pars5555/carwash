<div class="main_content">
    {include file="$TEMPLATE_DIR/main/left_panel.tpl"} 
    <div class="right-content">
        {if isset($ns.error_message)}
            <div class="error" >
                {$ns.error_message}
            </div>
        {/if}  
        {if isset($ns.success_message)}
            <div class="success" >
                {$ns.success_message}
            </div>
        {/if}  
        <form method="POST" action="{$SITE_PATH}/dyn/carwash/do_changepass">
            <div class="changepass-wrapper">
                <div class="form-group">
                    <label class="input_label">Password:</label>
                    <input class="text" type="password" name="password"/>  
                </div>
                <div class="form-group">
                    <label class="input_label">New Password:</label>
                    <input class="text" type="password" name="new_password"/>  
                </div>
                <div class="form-group">
                    <label class="input_label">Repeat New Password:</label>
                    <input class="text" type="password" name="repeat_new_password"/>  
                </div>
                <div class="changepass_btn">
                    <input class="button grey" type="submit" value="Save" />    
                </div>
            </div>
        </form>
    </div>
</div>
