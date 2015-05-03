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
                <div id="device_action_buttons_{$device->getId()}" style="{if $device->getStatus()=='off'}display:none{/if}">

                    {if $device->getCameraAvailable()==1}
                        <img class="devices_images" alt="" src="{$SITE_PATH}/image/{$device->getSerialNumber()}" base_path="{$SITE_PATH}/image/{$device->getSerialNumber()}" style="width: 100px"/>
                    {/if}
                    <a href="javascript:void(0);" class="button grey inline-block f_reset_device_counter" device_id="{$device->getId()}">Reset Counter</a>
                    <a href="javascript:void(0);" class="button grey inline-block f_restart_device" device_id="{$device->getId()}">Restart Device</a>
                    <a href="javascript:void(0);" class="button grey inline-block f_charge_device" device_id="{$device->getId()}">Charge for 1 minute</a>
                    <input type="hidden" value="{$device->getStatisticsPagePasscode()}"  id="statistics_page_passcode_{$device->getId()}" autocomplete="off"/>
                    <input type="hidden" value="{$device->getResetCounterButton()}"  id="reset_counter_button_{$device->getId()}" autocomplete="off"/>
                    <a href="javascript:void(0);" class="button grey inline-block f_set_statistics_page_passcode"  device_id="{$device->getId()}">Set Statistics Passcode</a>
                    <input type="hidden" value="{$device->getAmd100ChargeSeconds()}"  id="amd100_charge_seconds_{$device->getId()}" autocomplete="off"/>
                    <input type="hidden" value="{$device->getAmd200ChargeSeconds()}"  id="amd200_charge_seconds_{$device->getId()}" autocomplete="off"/>
                    <input type="hidden" value="{$device->getAmd500ChargeSeconds()}"  id="amd500_charge_seconds_{$device->getId()}" autocomplete="off"/>
                    <a href="javascript:void(0);" class="button grey inline-block f_set_prices"  device_id="{$device->getId()}">Set Prices</a>

                </div>
            {/foreach}
        </div>
    </div>
</div>

