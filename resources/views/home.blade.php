@extends('layouts.layout')

@section('title', 'Callmoms | Beranda')

@section('content')
    <p>{{ session('users_data')->peran }}</p>
@endsection