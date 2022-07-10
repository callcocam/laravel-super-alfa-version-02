@extends('errors::minimal')

@section('title', __('Server Error'))
@section('image',asset('assets/admin/images/samples/error-500.png'))
@section('code', 'Server Error 500')
@section('message', __('The website is currently unaivailable. Try again later or contact the developer.'))
