<?php

use Illuminate\Support\Facades\DB;

function districts()
{
    $districts = DB::table('districts')->select('name_en', 'id')->get();
    // $optiontext = '';
    // foreach ($datas as $key => $val) {
    //     $selected = ($value == $val->code) ? 'selected=selected' : '';
    //     $optiontext .= '<option '.$selected.' value="'.$val->code.'"> '.$val->name.' </option>';
    // }

    // return $optiontext;yy
    return response()->json(['districts' => $districts]);
}

function Get_Area_by_id($AT = '', $AI = '')
{
    $districts = DB::table('feedback')->select('name_en', 'id')->get();
    $optiontext = '';

    return $optiontext;
}
