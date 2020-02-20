@extends('layouts.simple')

@section('content')
<div class="row no-gutters flex-lg-10-auto">
    @include('filters')
    @include('results')
</div>
@endsection
