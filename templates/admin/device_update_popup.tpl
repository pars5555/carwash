<div class="modal" id="adminDeviceUpdatePopupModal">
    <div class="overlay"></div>
    <div class="modal-content f_modal_content active">
        <button class="close_button"></button>
        <div class="modal-body">
            <div id="device_update_error_message" class="error" ></div>
            <form enctype="multipart/form-data" action="{$SITE_PATH}/dyn/admin/do_update_device_firmware" method="POST" autocomplete="off" target="target_frame">
                <div class="form-group">
                    <label class="input_label label inline-block">Version</label>
                    <input type="text" class="text inline-block" style="width: 200px" name="version"/>
                    <input type="file" name="firmware"/>
                    <input type="hidden" name="device_id" value="{$ns.deviceDto->getId()}"/>
                </div>
                <button class="button blue inline-block f_save_btn">Upload</button>
            </form>
            <iframe name="target_frame" id="target_frame"></iframe>
        </div>
    </div>
</div>