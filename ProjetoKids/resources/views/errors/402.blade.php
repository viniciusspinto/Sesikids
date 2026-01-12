@extends('errors::minimal')

@section('title', 'Pagamento Necessário')
@section('code', 'ERRO 402')

@section('image')
    <img src="{{ asset('img/402.png') }}" alt="Erro 402" style="width: 380px; margin-bottom: 24px; border-radius: 12px; box-shadow: 0 4px 16px rgba(44,0,84,0.18);">
@endsection

@section('message')
    <span style="fot-size: 22px; font-weight: 600; color: #fff; text-shadow: 1px 2px 8px #4b1768;">
        O acesso a esta página requer pagamento.
    </span>
@endsection

@section('subtitle')
    <span style="font-size: 16px; color: #e0c3fc;">
        Caso já tenha efetuado o pagamento, aguarde a confirmação ou entre em contato com o suporte.
    </span>
@endsection