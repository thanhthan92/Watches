<?php
	$title = 'Trang quản trị';
	$website_name = DB::table('website_metadata')->where('key', 'website_name')->value('value');
	if (!empty($website_name)) {
		$title .= ' - ' . $website_name;
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>{!! $title; !!}</title>

<link href="{{asset('/back-end/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('/back-end/css/datepicker3.css')}}" rel="stylesheet">
<link href="{{asset('/back-end/css/styles.css')}}" rel="stylesheet">
<script type="text/javascript" src="{!! url('/plugin/ckeditor/ckeditor.js') !!}"></script>
<script src="{!!url('/back-end/js/jquery-1.11.1.min.js')!!}"></script>

<!--Icons-->
<script src="{{asset('/back-end/js/lumino.glyphs.js')}}"></script>

<!--[if lt IE 9]>
<script src="public/js/html5shiv.js"></script>
<script src="public/js/respond.min.js"></script>
<![endif]-->

</head>