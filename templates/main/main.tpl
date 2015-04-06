<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        {include file="$TEMPLATE_DIR/main/util/headerControls.tpl"}
    </head>
    <body>
        <header>
            {include file="$TEMPLATE_DIR/main/util/header.tpl"} 
        </header>
        <div class="wrapper">
            <input type="hidden" id="initialLoad" name="initialLoad" value="main" />		
            <input type="hidden" id="contentLoad" value="{$ns.contentLoad}" />
            <div id="main_content">
                {nest ns=content}
            </div>
            {include file="$TEMPLATE_DIR/main/set_device_passcode_popup.tpl"}
        </div>
        <footer>
            {include file="$TEMPLATE_DIR/main/util/footer.tpl"} 
        </footer>
    </body>
</html>