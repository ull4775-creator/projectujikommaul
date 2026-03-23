@php
    $isMobile = request()->header('User-Agent') &&
        preg_match('/Mobile|Android|iPhone|iPad/i', request()->header('User-Agent'));
@endphp

@if($isMobile)
    @include('admin.dashboard.mobile')
@else
    @include('admin.dashboard.desktop')
@endif
