<?php

class Device {

    public $id;
    public $serialNumber;
    public $title;
    public $statisticsPagePasscode;
    public $amd100Qty;
    public $amd200Qty;
    public $amd500Qty;
    public $totalAmd;
    public $isBusy;
    public $lastPing;
    public $status;

    function getId() {
        return $this->id;
    }

    function getSerialNumber() {
        return $this->serialNumber;
    }

    function getTitle() {
        return $this->title;
    }

    function getStatisticsPagePasscode() {
        return $this->statisticsPagePasscode;
    }

    function getAmd100Qty() {
        return $this->amd100Qty;
    }

    function getAmd200Qty() {
        return $this->amd200Qty;
    }

    function getAmd500Qty() {
        return $this->amd500Qty;
    }

    function getTotalAmd() {
        return $this->totalAmd;
    }

    function getIsBusy() {
        return $this->isBusy;
    }

    function getLastPing() {
        return $this->lastPing;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setSerialNumber($serialNumber) {
        $this->serialNumber = $serialNumber;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setStatisticsPagePasscode($statisticsPagePasscode) {
        $this->statisticsPagePasscode = $statisticsPagePasscode;
    }

    function setAmd100Qty($amd100Qty) {
        $this->amd100Qty = $amd100Qty;
    }

    function setAmd200Qty($amd200Qty) {
        $this->amd200Qty = $amd200Qty;
    }

    function setAmd500Qty($amd500Qty) {
        $this->amd500Qty = $amd500Qty;
    }

    function setTotalAmd($totalAmd) {
        $this->totalAmd = $totalAmd;
    }

    function setIsBusy($isBusy) {
        $this->isBusy = $isBusy;
    }

    function setLastPing($lastPing) {
        $this->lastPing = $lastPing;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}

?>