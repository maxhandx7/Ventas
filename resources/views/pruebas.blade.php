
@extends('layouts.web')
@section('title', $business->name )
@section('styles')
@endsection
@section('content')

<div class="alert alert-warning text-center" style="margin-top: 1rem" role="alert">
  <h2 class="alert-heading">Zona de pruebas</h2>
  <p>Zona para pruebas</p>
  <p class="mb-2"></p>

  @push('modal')
  <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
          <div class="modal-content rounded-0">
              <div class="modal-header">
                  <h4 class="modal-title">Editar dirección</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>

              {!! Form::model($profile,['route'=>['update_profile',$profile], 'method'=>'PUT']) !!}
              <div class="modal-body">

                  <div class="single-input-item">
                      <label for="address" class="required">Dirección de envió</label>
                      <input type="text" id="address" name="address" value="{{old('address', $profile->address)}}"
                          placeholder="Dirección de envió" />
                  </div>
                  <div class="single-input-item">
                      <label for="phone" class="required">Numero de teléfono/celular</label>
                      <input type="number" id="phone" name="phone" value="{{old('phone', $profile->phone)}}"
                          placeholder="Numero de teléfono/celular" />
                  </div>

              </div>
              <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="check-btn sqr-btn">Guardar cambios</button>
              </div>

              {!! Form::close() !!}

          </div>
          <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
  </div>
  @endpush
</div>

@endsection

@section('scripts')
    
@endsection