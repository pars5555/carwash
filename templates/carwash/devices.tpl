<div class="main_content">
    {include file="$TEMPLATE_DIR/main/left_panel.tpl"} 
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
                <img class="devices_images" src="{$SITE_PATH}/image/{$device->getSerialNumber()}" base_path="{$SITE_PATH}/image/{$device->getSerialNumber()}" />
                <div id="device_action_buttons_{$device->getId()}" style="{if !$isDeviceOn}display:none{/if}">
                    <a href="javascript:void(0);" class="button grey inline-block f_reset_device_counter" device_id="{$device->getId()}">Reset Counter</a>
                    <a href="javascript:void(0);" class="button grey inline-block f_restart_device" device_id="{$device->getId()}">Restart Device</a>
                    <a href="javascript:void(0);" class="button grey inline-block f_charge_device" device_id="{$device->getId()}">Charge for 1 minute</a>
                    <input type="hidden" value="{$device->getStatisticsPagePasscode()}"  id="statistics_page_passcode_{$device->getId()}" autocomplete="off"/>
                    <a href="javascript:void(0);" class="button grey inline-block f_set_statistics_page_passcode"  device_id="{$device->getId()}">Set Statistics Passcode</a>

                </div>
            {/foreach}
        </div>
    </div>

