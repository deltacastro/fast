@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Adminsitrador de equipos</h2>
        </div>
        <div class="card-body">
            <button class="btn btn-primary col-12 col-md-6 col-lg-3 nuevoEquipo" data-target="#modal-generic">
                Nuevo equipo
            </button>

            <div id="ajaxTable" class="px-0 col-12">
                {{-- @include('ti.equipo._list') --}}
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                    <span class=""></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-generic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <span class=""></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal-btn-false" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="modal-save" class="btn btn-primary modal-btn-true">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/controller/ti/equipos/index.js') }}"></script>
@endsection

