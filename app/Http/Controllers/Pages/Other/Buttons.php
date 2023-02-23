<?php

namespace App\Http\Controllers\Pages\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Buttons extends Controller
{
    public $button_restart = '<a href="javascript:void(0);" class="nav-link">
    <i class="nav-link-icon lnr-inbox"></i>
    <span>
        Inbox
    </span>
    <div class="ml-auto badge badge-pill badge-secondary">86</div>
</a>';
}
