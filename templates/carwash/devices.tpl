<div class="main_content">
    {include file="$TEMPLATE_DIR/main/left_panel.tpl"} 
    <div class="right-content">
        {foreach from=$ns.devicesDtos item=deviceDto name=foo}            
            <div>
                {$smarty.foreach.foo.index+1}
                {assign var="totalAmd" value=$deviceDto->getAmd100Qty()*100+$deviceDto->getAmd200Qty()*200+$deviceDto->getAmd500Qty()*500}
                {assign var="isDeviceOn" value="-10 seconds"|date_format:"%Y-%m-%d %H:%M:%S"<$deviceDto->getLastPing() && $deviceDto->getLastPing()!=''}
                <span id="device_title_{$deviceDto->getId()}">
                    {$deviceDto->getTitle()}
                </span>
                <span id="device_status_{$deviceDto->getId()}">
                    {if !$isDeviceOn}
                        Off
                    {else}
                        {if $deviceDto->getIsBusy()==1}Busy{else}Free{/if}
                    {/if}
                </span>
                (<span id="device_total_amd_{$deviceDto->getId()}">
                    {$totalAmd} 
                </span>դր)
                
                <div id="device_action_buttons_{$deviceDto->getId()}" style="{if !$isDeviceOn}display:none{/if}">
                    <a href="javascript:void(0);" class="button grey inline-block f_reset_device_counter" device_id="{$deviceDto->getId()}">Reset Counter</a>
                    <a href="javascript:void(0);" class="button grey inline-block f_restart_device" device_id="{$deviceDto->getId()}">Restart Device</a>
                    <a href="javascript:void(0);" class="button grey inline-block f_charge_device" device_id="{$deviceDto->getId()}">Charge for 1 minute</a>
                    <input type="hidden" value="{$deviceDto->getStatisticsPagePasscode()}"  id="statistics_page_passcode_{$deviceDto->getId()}" autocomplete="off"/>
                    <a href="javascript:void(0);" class="button grey inline-block f_set_statistics_page_passcode"  device_id="{$deviceDto->getId()}">Set Statistics Passcode</a>
                
            </div>
        {/foreach}
    </div>
</div>

