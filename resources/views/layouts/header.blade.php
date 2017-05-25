<?php
    $title = '';
    $website_name = DB::table('website_metadata')->where('key', 'website_name')->value('value');
    if (!empty($website_name)) {
        $title = $website_name;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('/images/logo.png')}}" alt="logo" width="50" height="20">

    <title>{!! $title; !!}</title>

    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <style>
        body{font-family:'Lato'}
        .fa-btn{margin-right:6px}
    </style>
    
    <link href="{{ asset('/front-end/front-end-style.css')}}" rel="stylesheet">
    <link rel='stylesheet' id='camera-css'  href="{{ asset('/css/camera.css')}}" type='text/css' media='all'>
    <link rel='stylesheet' id='camera-css' href="{{ asset('/css/cam-1.css')}}" type='text/css' media='all'>
    <link rel='stylesheet' id='test-css' href="{{ asset('/css/header-custom.css')}}" type='text/css' media='all'>
    <link href="{{ asset('css/blueimp-gallery.css')}}" rel="stylesheet">
    

    <script type='text/javascript' src="{{ asset('/js/ads.js')}}"></script>
    <script type='text/javascript' src="{{ asset('/js/jquery.min.js')}}"></script>
  </head>