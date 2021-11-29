@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('icon', 'fas fa-lock')
@section('message', __('Unauthorized'))