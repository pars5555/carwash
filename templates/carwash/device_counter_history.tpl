<div class="main_content">
    {include file="$TEMPLATE_DIR/main/left_panel.tpl"} 
    <div class="right-content">
        {foreach from=$ns.devicesDtos item=deviceDto name=foo}          
            <a href="{$SITE_PATH}/counterhistory/{$deviceDto->getId()}" class="button grey" style="float:left">{$deviceDto->getTitle()}</a>
        {/foreach}
        {if isset($ns.selectedDeviceDto)}
            <div class="clear"></div>
        
            {foreach from=$ns.deviceCounterHistory item=deviceCounteryHistoryDto name=foo}          
            <span>{$deviceCounteryHistoryDto->getAmd100Qty()}</span>
            <span>{$deviceCounteryHistoryDto->getAmd200Qty()}</span>
            <span>{$deviceCounteryHistoryDto->getAmd500Qty()}</span>
            <span>{$deviceCounteryHistoryDto->getDatetime()}</span></br>
        {/foreach}
            
        {/if}
    </div>
</div>
</div>

