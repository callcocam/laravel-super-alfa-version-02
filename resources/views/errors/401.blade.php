@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('image',asset('assets/admin/images/samples/error-403.png'))
@section('code', 'Unauthorized 401')
@section('message', __('Unauthorized'))
