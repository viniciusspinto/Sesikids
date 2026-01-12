@extends('errors::minimal')

@section('title', 'Não autorizado')

@section('image')
    <img src="{{ asset('img/401.png') }}" alt="Erro 401" style="width: 580px; margin-bottom: 24px; border-radius: 12px; ">
@endsection

@section('message')
    <span style="font-size: 22px; font-weight: 600; color: #fff; text-shadow: 1px 2px 8px #4b1768;">
        Você não tem permissão para acessar esta página.
    </span>
@endsection

@section('subtitle')
    <span style="font-size: 16px; color: #e0c3fc;">
        Se você acredita que isso é um erro, entre em contato com o administrador.
    </span>
@endsection