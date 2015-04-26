<h2 class="main_title">Devices</h2>
<div class="main_content">
    {include file="$TEMPLATE_DIR/admin/left_panel.tpl"} 
    <div class="right-content">
        <a class="button grey" id="admin_add_carwash_btn">Add Carwash</a>
        {foreach from=$ns.carwashDtos item=carwashDto name=foo}            
            <a class="f_admin_edit_carwash blue" href="javascript:void(0);" carwash_id="{$carwashDto->getId()}" carwash_title="{$carwashDto->getTitle()}" carwash_login="{$carwashDto->getLogin()}" carwash_password="{$carwashDto->getPassword()}">
            edit
            </a>
                {$smarty.foreach.foo.index+1}
                <span >
                    {$carwashDto->getTitle()}
                </span>               
                <span >
                    {$carwashDto->getLogin()}
                </span>
                <span >
                    {$carwashDto->getPassword()}
                </span>
                <span >
                   ( id: {$carwashDto->getId()})
                </span>               
            <div style="padding-left: 30px;">
                {foreach from=$ns.carwashDeviceIdsArray[$carwashDto->getId()] item=devicesId}
                    {if isset($ns.allDevicesMappedById[$devicesId])}
                        {assign var="deviceDto" value=$ns.allDevicesMappedById[$devicesId]}
                    {/if}
                    {if isset($deviceDto)}
                        {$deviceDto->getTitle()} {$deviceDto->getSerialNumber()}
                    {/if}
                {/foreach}
            </div>
        {/foreach}
    </div>
</div>
{include file="$TEMPLATE_DIR/admin/add_carwash_popup.tpl"}
