<h2 class="main_title">Devices</h2>
<div class="main_content">
    {include file="$TEMPLATE_DIR/admin/left_panel.tpl"} 
    <div class="right-content">
        {foreach from=$ns.carwashDtos item=carwashDto name=foo}            
            <div>
                {$smarty.foreach.foo.index+1}
                <span id="device_title_{$carwashDto->getId()}">
                    {$carwashDto->getTitle()}
                </span>
                <span id="device_status_{$carwashDto->getId()}">
                    {$carwashDto->getStatus()}
                </span>
                <span id="device_status_{$carwashDto->getId()}">
                    {$carwashDto->getLogin()}
                </span>
                <span id="device_status_{$carwashDto->getId()}">
                    {$carwashDto->getPassword()}
                </span>
            </div>
        {/foreach}
    </div>
</div>
<div id="admin_device_actions_container"></div>
