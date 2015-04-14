<div class="modal" id="adminDeviceActionsPopupModal">
    <div class="overlay"></div>
    <div class="modal-content f_modal_content active">
        <button class="close_button"></button>
        <div class="modal-body">
            <div class="form-group">
                <label class="input_label label" for="email">Statistics page passcode</label>
                <input type="text" value="{$ns.deviceDto->getStatisticsPagePasscode()}"/>
            </div>
            <div class="form-group">

                <label class="input_label label" for="email">Reset Button</label>
                <input type="text" value="{$ns.deviceDto->getResetCounterButton()}"/>
            </div>

            <div class="form-group">
                <label class="input_label label" for="email">Device Title</label>
                <input type="text" value="{$ns.deviceDto->getTitle()}"/>
            </div>

            <div class="form-group">
                <label class="input_label label" for="email">Ping URL</label>
                <input type="text" value="{$ns.deviceDto->getServerPingUrl()}"/>
            </div>

            <div class="form-group">
                <label class="input_label label" for="email">Image Post URL</label>
                <input type="text" value="{$ns.deviceDto->getServerImagePostUrl()}"/>
            </div>

            <div class="form-group">
                <label class="input_label label" for="email">Camera Available</label>
                <input type="text" value="{$ns.deviceDto->getCameraAvailable()}"/>
            </div>

            <button class="save_pass button blue" id="savePassBtn">
                Save
            </button>

        </div>
    </div>
</div>