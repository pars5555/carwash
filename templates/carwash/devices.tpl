<div class="main_content">
    {include file="$TEMPLATE_DIR/main/left_panel.tpl"} 
    <div class="right-content">
        {foreach from=$ns.devicesDtos item=deviceDto name=foo}
            {$smarty.foreach.foo.index+1} {if $deviceDto->getIsBusy()==1}Busy{else}Free{/if}}
        {/foreach}
        devices
    </div>
</div>
