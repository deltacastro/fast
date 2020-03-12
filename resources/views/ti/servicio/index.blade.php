@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="">
            @include('ti.servicio._solicitante')
            @include('ti.servicio._hardware')
            @include('ti.servicio._software')
            @include('ti.servicio._respaldos')
            @include('ti.servicio._observaciones')
            @include('ti.servicio._entrega')
        </form>
    </div>
@endsection
