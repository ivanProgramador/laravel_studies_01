@extends('layouts.main_layout')
@section('content')

{{-- Apresentando meu nome na view --}}

@if(!empty($nome))
   <p>{{$nome}}</p>
@endif

@endsection