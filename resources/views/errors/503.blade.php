@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'The latest changes are not deployed yet. Please click "Deploy to Server" and wait for deployment to finish.'))
