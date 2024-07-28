@extends('web.myAccount')
@section('content_tab')
    <div class="col-lg-9 col-md-8">

        <div class="myaccount-content">
            <h3>Cambio de contraseña</h3>
            <div class="account-details-form">

                {!! Form::model($user, ['route' => ['web.update_password', $user], 'method' => 'PUT']) !!}


                <div class="single-input-item">
                    <label for="old_password" class="required">Contraseña actual</label>
                    <input type="password" id="old_password" name="old_password" placeholder="Contraseña actual" required />
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="password" class="required">Nueva contraseña</label>
                            <input type="password" id="password" name="password" placeholder="Nueva contraseña" required />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="password-confirm" class="required">confirmar Contraseña</label>
                            <input type="password" id="password-confirm" name="password_confirmation"
                                placeholder="confirmar Contraseña" />
                        </div>
                    </div>
                </div>

                <div class="single-input-item">
                    <button class="check-btn sqr-btn ">Guardar cambios</button>
                </div>


                {!! Form::close() !!}

            </div>
        </div>

        {{--  </div>  --}}

        {{--  </div>  --}}
    </div>
@endsection
