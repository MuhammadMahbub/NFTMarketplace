<?php
function generalsettings()
{
    return \App\Models\GeneralSetting::first();
}

function helpCenterTitle(){
    return \App\Models\HelpCenterTitle::first();
}

function socialurls()
{
    return \App\Models\Socialurl::first();
}

function colorSettings()
{
    return \App\Models\ColorSetting::first();
}

function themesettings($user_id)
{
    return \App\Models\ThemeSetting::where('user_id', $user_id)->first();
}

function nftCategories()
{
    return \App\Models\NFTCategory::all();
}

function reports()
{
    return \App\Models\ItemReport::all();
}
