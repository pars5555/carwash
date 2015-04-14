<h2 class="main_title">Devices</h2>
<div class="main_content">
    {include file="$TEMPLATE_DIR/admin/left_panel.tpl"} 
    <div class="right-content">
        {foreach from=$ns.devices item=device name=foo}            
            <div>
                {$smarty.foreach.foo.index+1}
                <span id="device_title_{$device->getId()}">
                    {$device->getTitle()}
                </span>
                <span id="device_status_{$device->getId()}">
                    {$device->getStatus()}
                </span>
                (<span id="device_total_amd_{$device->getId()}">{$device->getTotalAmd()}</span>դր)
                <div id="device_action_buttons_{$device->getId()}" style="{if $device->getStatus()=='off'}display:none{/if}">
                    <img class="devices_images" alt="" src="{$SITE_PATH}/image/{$device->getSerialNumber()}" base_path="{$SITE_PATH}/image/{$device->getSerialNumber()}" style="width: 100px"/>
                    <a href="javascript:void(0);" class="button grey inline-block f_device_actions" device_id="{$device->getId()}">Actions</a>

                </div>
            {/foreach}
        </div>
    </div>
</div>
<div id="admin_device_actions_container"></div>
