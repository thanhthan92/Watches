<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Info;
use DateTime,File,Input,DB;

class InfoController extends Controller
{
    public static $attrs = array(
        'website_name',
        'website_guarantee_detail',
        'website_ship_detail',
        'website_phone',
        'website_email'
    );

    public static $attrs_reputation = array(
        'website_warantee', 'website_authentic', 'website_cash', 'website_safe', 'website_ship', 'website_support',
    );

    public function getinformation()
    {
        $data = array();
        Info::all()->map(function($item) use (&$data) {
            $data[$item->key] = $item->value;
        });

        foreach ($this::$attrs as $value) {
            if (!isset($data[$value])) {
                $data[$value] = '';
            }
        }
        foreach ($this::$attrs_reputation as $value) {
            if (!isset($data[$value])) {
                $data[$value] = '';
            }
            if (!isset($data[$value . '_is'])) {
                $data[$value . '_is'] = '';
            }
        }
        return view('back-end.info.view',['data' => $data]);
    }

    public function postinformation(Request $rq)
    {
        $data = Info::all();
        foreach ($this::$attrs_reputation as $value) {
            $rq->{$value . '_is'} = !empty($rq->{$value . '_is'}) ? 'checked' : '';
        }
        $arr = array();
        foreach ($this::$attrs as $value) {
            $arr[] = ['key' => $value, 'value' => $rq->{$value}];
        }
        foreach ($this::$attrs_reputation as $value) {
            $arr[] = ['key' => $value, 'value' => $rq->{$value}];
            $arr[] = ['key' => $value . '_is', 'value' => $rq->{$value . '_is'}];
        }
        if ($data->count() == 0)
        {
            DB::table('website_metadata')->insert($arr);
        }

        else
        {
            foreach ($this::$attrs as $value) {
                DB::table('website_metadata')->where('key', $value)->update(['value' => $rq->{$value}]);
            }
            foreach ($this::$attrs_reputation as $value) {
                if (isset($rq->{$value})) {
                    DB::table('website_metadata')->where('key', $value)->update(['value' => $rq->{$value}]);
                }
                DB::table('website_metadata')->where('key', $value . '_is')->update(['value' => $rq->{$value . '_is'}]);
            }
        }

        return redirect('admin/information')->with(['message'=>'OK']);
    }
}
