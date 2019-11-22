<?php

namespace App\states;

interface State
{
    public function incrementH();
    public function incrementM();
    public function tick();
}