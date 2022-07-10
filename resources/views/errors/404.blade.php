@extends('errors::minimal')

@section('title', __('Not Found'))
@section('image',asset('assets/admin/images/samples/error-404.png'))
@section('code', 'Not Found 404')
@section('message', __('The page you are looking not found.'))
