@extends('layouts.dashboard')
@section('title','dashboard')
@section('content')
@component('dashboard.components.breadcrumb')
@slot('title')
dashboard
@endslot
@endcomponent

@endsection
