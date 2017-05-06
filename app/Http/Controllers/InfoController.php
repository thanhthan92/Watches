<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Info;
use DateTime,File,Input,DB;

class InfoController extends Controller
{
    public function getinformation()
    {
        $data = array();
        Info::all()->map(function($item) use (&$data) {
            $data[$item->key] = $item->value;
        });
        if (empty($data)) {
            $data['website_name'] = '';
            $data['website_transaction_is'] = '';
            $data['website_warantee_is'] = '';
            $data['website_warantee'] = '';
            $data['website_authentic_is'] = '';
            $data['website_authentic'] = '';
            $data['website_cash_is'] = '';
            $data['website_cash'] = '';
            $data['website_safe_is'] = '';
            $data['website_safe'] = '';
            $data['website_ship_is'] = '';
            $data['website_ship'] = '';
            $data['website_support_is'] = '';
            $data['website_support'] = '';
            $data['website_guarantee_detail'] = '';
            $data['website_ship_detail'] = '';
        }
        return view('back-end.info.view',['data' => $data]);
    }

    public function postinformation(Request $rq)
    {
        $data = Info::all();
        $rq->website_transaction_is = !empty($rq->website_transaction_is) ? 'checked' : '';
        $rq->website_warantee_is = !empty($rq->website_warantee_is) ? 'checked' : '';
        $rq->website_authentic_is = !empty($rq->website_authentic_is) ? 'checked' : '';
        $rq->website_cash_is = !empty($rq->website_cash_is) ? 'checked' : '';
        $rq->website_safe_is = !empty($rq->website_safe_is) ? 'checked' : '';
        $rq->website_ship_is = !empty($rq->website_ship_is) ? 'checked' : '';
        $rq->website_support_is = !empty($rq->website_support_is) ? 'checked' : '';
        if ($data->count() == 0)
        {
            DB::table('website_metadata')->insert([
                ['key' => 'website_name',               'value' => $rq->website_name],
                ['key' => 'website_transaction_is',     'value' => $rq->website_transaction_is],
                ['key' => 'website_warantee_is',        'value' => $rq->website_warantee_is],
                ['key' => 'website_warantee',           'value' => $rq->website_warantee],
                ['key' => 'website_authentic_is',       'value' => $rq->website_authentic_is],
                ['key' => 'website_authentic',          'value' => $rq->website_authentic],
                ['key' => 'website_cash_is',            'value' => $rq->website_cash_is],
                ['key' => 'website_cash',               'value' => $rq->website_cash],
                ['key' => 'website_safe_is',            'value' => $rq->website_safe_is],
                ['key' => 'website_safe',               'value' => $rq->website_safe],
                ['key' => 'website_ship_is',            'value' => $rq->website_ship_is],
                ['key' => 'website_ship',               'value' => $rq->website_ship],
                ['key' => 'website_support_is',         'value' => $rq->website_support_is],
                ['key' => 'website_support',            'value' => $rq->website_support],
                ['key' => 'website_guarantee_detail',   'value' => $rq->website_guarantee_detail],
                ['key' => 'website_ship_detail',        'value' => $rq->website_ship_detail]
            ]);
        }
        else
        {
            DB::table('website_metadata')
                ->where('key', 'website_name')->update(['value' => $rq->website_name]);
            DB::table('website_metadata')
                ->where('key', 'website_transaction_is')->update(['value' => $rq->website_transaction_is]);
            
            DB::table('website_metadata')
                ->where('key', 'website_warantee_is')->update(['value' => $rq->website_warantee_is]);
            if (isset($rq->website_warantee)) {
                DB::table('website_metadata')
                    ->where('key', 'website_warantee')->update(['value' => $rq->website_warantee]);
            }

            DB::table('website_metadata')
                ->where('key', 'website_authentic_is')->update(['value' => $rq->website_authentic_is]);
            if (isset($rq->website_authentic)) {
                DB::table('website_metadata')
                    ->where('key', 'website_authentic')->update(['value' => $rq->website_authentic]);
            }

            DB::table('website_metadata')
                ->where('key', 'website_cash_is')->update(['value' => $rq->website_cash_is]);
            if (isset($rq->website_cash)) {
                DB::table('website_metadata')
                    ->where('key', 'website_cash')->update(['value' => $rq->website_cash]);
            }

            DB::table('website_metadata')
                ->where('key', 'website_safe_is')->update(['value' => $rq->website_safe_is]);
            if (isset($rq->website_safe)) {
                DB::table('website_metadata')
                    ->where('key', 'website_safe')->update(['value' => $rq->website_safe]);
            }

            DB::table('website_metadata')
                ->where('key', 'website_ship_is')->update(['value' => $rq->website_ship_is]);
            if (isset($rq->website_ship)) {
                DB::table('website_metadata')
                    ->where('key', 'website_ship')->update(['value' => $rq->website_ship]);
            }

            DB::table('website_metadata')
                ->where('key', 'website_support_is')->update(['value' => $rq->website_support_is]);
            if (isset($rq->website_support)) {
                DB::table('website_metadata')
                    ->where('key', 'website_support')->update(['value' => $rq->website_support]);
            }

            DB::table('website_metadata')
                ->where('key', 'website_guarantee_detail')->update(['value' => $rq->website_guarantee_detail]);
            DB::table('website_metadata')
                ->where('key', 'website_ship_detail')->update(['value' => $rq->website_ship_detail]);
        }

        return redirect('admin/information')->with(['message'=>'OK']);
    }
}
