<?php

use kartik\datecontrol\DateControl;


class TestDateControl extends DateControl
{
    public function run() {
        echo '<h4>Display Format: '. $this->displayFormat . '</h4>';
        echo '<h4>Save Format: '. $this->saveFormat . '</h4>';
        return parent::run();
    }
}