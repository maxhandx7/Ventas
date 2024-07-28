@extends('web.myAccount')
@section('content_tab')
    <div class="col-lg-9 col-md-8">


        <!-- Single Tab Content Start -->
        <div class="myaccount-content">
            <h3>Detalles de cuenta</h3>
            <div class="account-details-form">

                {!! Form::model($user, ['route' => ['web.update_client', $user], 'method' => 'PUT']) !!}


                <div class="container">
                    <div class="row">
                        <!-- Profile Image Section -->
                        <div class="col-12 col-md-4 mt-2 mb-4 d-flex justify-content-center">
                            <div class="border-bottom text-center">
                                <img id="profileImage" src="{{ asset('image/' . Auth::user()->profile->image) }}"
                                    alt="profile" class="img-lg rounded-circle mb-3" />
                                <div class="d-flex justify-content-center">
                                    <input type="file" id="profile_image" name="profile_image" class="d-none" />
                                    <button type="button" class="btn btn-success" id="changeImageButton">Cambiar
                                        imagen</button>
                                </div>
                            </div>
                        </div>

                        <!-- User Information Section -->
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <!-- Name Field -->
                                <div class="col-12 col-lg-6">
                                    <div class="single-input-item">
                                        <label for="name" class="required">Nombre</label>
                                        <input type="text" id="name" name="name"
                                            value="{{ old('ruc', $user->name) }}" placeholder="Nombre" required />
                                    </div>
                                </div>

                                <!-- Surnames Field -->
                                <div class="col-12 col-lg-6">
                                    <div class="single-input-item">
                                        <label for="surnames" class="required">Apellido</label>
                                        <input type="text" id="surnames" name="surnames"
                                            value="{{ old('ruc', $user->surnames) }}" placeholder="Apellido" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Email Field -->
                            <div class="single-input-item">
                                <label for="email" class="required">Dirección de correo electronico</label>
                                <input type="email" id="email" name="email" value="{{ old('ruc', $user->email) }}"
                                    placeholder="Dirección de correo electrónico" required />
                            </div>

                            <div class="row">
                                <!-- DNI Field -->
                                <div class="col-12 col-lg-6">
                                    <div class="single-input-item">
                                        <label for="dni" class="required">Número de cedula</label>
                                        <input type="number" id="cc" name="cc"
                                            value="{{ old('ruc', $user->profile->cc) }}" placeholder="Número de cedula"
                                            required />
                                    </div>
                                </div>

                                <!-- RUT Field -->
                                <div class="col-12 col-lg-6">
                                    <div class="single-input-item">
                                        <label for="rut">Número de rut</label>
                                        <input type="number" id="rut" name="rut"
                                            value="{{ old('rut', $user->profile->rut) }}"
                                            placeholder="Número de RUT (opcional)" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="single-input-item">
                                <button class="check-btn btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
    @endsection
@section('scripts')
    {!! Html::script('js/jquery.js') !!}

<script>
    $('#changeImageButton').click(function() {
        $('#profile_image').click();
    });

    $('#profile_image').change(function() {
        var formData = new FormData();
        formData.append('profile_image', $('#profile_image')[0].files[0]);
        formData.append('_token', '{{ csrf_token() }}');

        $.ajax({
            url: '{{ route('update_profile_image') }}',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    $('#profileImage').attr('src', response.image_url);
                    alert('Imagen de perfil actualizada con éxito');
                } else {
                    alert('Error al actualizar la imagen de perfil');
                }
            },
            error: function(response) {
                alert('Error al actualizar la imagen de perfil');
            }
        });
    });
</script>

@endsection
