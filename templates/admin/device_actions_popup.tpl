<div class="modal" id="adminDeviceActionsPopupModal">
    <div class="overlay"></div>
    <div class="modal-content f_modal_content active">
        <button class="close_button"></button>
        <div class="modal-body">
            <div class="form-group">
                <label class="input_label label inline-block" for="email">Statistics page passcode</label>
                <input type="text" class="text inline-block" style="width: 200px" value="{$ns.deviceDto->getStatisticsPagePasscode()}" name="value"/>
                <input type="hidden" value="statistics_page_passcode" name="variable_name"/>                
                <button class="button blue inline-block f_save_btn">Save</button>
            </div>
            <div class="form-group">

                <label class="input_label label inline-block" for="email">Reset Button</label>
                <input type="text" class="text inline-block" style="width: 200px" value="{$ns.deviceDto->getResetCounterButton()}"/>
                <input type="hidden" value="reset_button" name="variable_name"/>                
                <button class="button blue inline-block f_save_btn">Save</button>
            </div>

            <div class="form-group">
                <label class="input_label label inline-block" for="email">Device Title</label>
                <input type="text" class="text inline-block" style="width: 200px" value="{$ns.deviceDto->getTitle()}"/>
                <input type="hidden" value="device_title" name="variable_name"/>                
                <button class="button blue inline-block f_save_btn">Save</button>
            </div>

            <div class="form-group">
                <label class="input_label label inline-block" for="email">Server Host</label>
                <input type="text" class="text inline-block" style="width: 200px" value="{$ns.deviceDto->getServerHost()}"/>
                <input type="hidden" value="server_host" name="variable_name"/>                
                <button class="button blue inline-block f_save_btn">Save</button>
            </div>
                
            <div class="form-group">
                <label class="input_label label inline-block" for="email">Ping URL</label>
                <input type="text" class="text inline-block" style="width: 200px" value="{$ns.deviceDto->getServerPingUrl()}"/>
                <input type="hidden" value="server_ping_url" name="variable_name"/>                
                <button class="button blue inline-block f_save_btn">Save</button>
            </div>

            <div class="form-group">
                <label class="input_label label inline-block" for="email">Image Post URL</label>
                <input type="text" class="text inline-block" style="width: 200px" value="{$ns.deviceDto->getServerImagePostUrl()}"/>
                <input type="hidden" value="server_image_post_url" name="variable_name"/>                
                <button class="button blue inline-block f_save_btn">Save</button>
            </div>

            <div class="form-group">
                <label class="input_label label inline-block" for="email">Camera Available</label>
                <input type="text" class="text inline-block" style="width: 200px" value="{$ns.deviceDto->getCameraAvailable()}"/>
                <input type="hidden" value="camera_available" name="variable_name"/>                
                <button class="button blue inline-block f_save_btn">Save</button>
            </div>



        </div>
    </div>
</div>