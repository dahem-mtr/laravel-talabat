@extends('layouts.dashboard')
@section('title','dashboard')
@section('namePage','dashboard')

@section('content')
{{Auth::user()->group->name}}
@endsection
