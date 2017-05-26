@extends('back-end.layouts.master')
@section('content')
<script type="text/javascript">
    var obj = document.getElementById('order');
    if (obj != null && obj != undefined) {
        obj.className = "active";
    }
</script>
@endsection