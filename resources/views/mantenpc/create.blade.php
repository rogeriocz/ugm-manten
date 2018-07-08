@extends('layout')

@section('content')



        <form method="POST" action="{{ route('manetenimiento.store') }}">
      {{ csrf_field() }}

  <div class="col-md-4">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">MANTENIMIENTOS PREVENTIVOS</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
               
                  
                  <div class="box-header with-border">
                      <div class="form-group col-md-12 {{ $errors->has('t_equipo') ? 'has-error' : '' }}">
                        <label>Tipo de Equipo</label>
                        <input type="" name="t_equipo" class="form-control" value="{{ old('t_equipo') }}"
                        placeholder="Ingresa aquí el tipo de equipo">
                        {!! $errors->first('t_equipo', '<span class="help-block">:message</span>') !!}
                        
                      </div>
                      <div class="form-group {{ $errors->has('pc_id') ? 'has-error' : '' }}">
                        <label>Categorías</label>
                          <select name="pc_id" class="form-control select2">
                          <option value="">Seleciona una categoría</option>

                  @foreach($tipopc as $pc)

                  <option value="{{ $pc->id }}">{{ $pc->nombre }}</option>
                   

                  @endforeach

                </select>
                {!! $errors->first('pc_id', '<span class="help-block">:message</span>') !!}
              </div>

                     

                      <div class="form-group col-md-12 {{ $errors->has('marca') ? 'has-error' : '' }}">
                        <label>Marca</label>
                        <input type="" name="marca" class="form-control" value="{{ old('marca') }}"
                        placeholder="Ingresa aquí el tipo de equipo">
                        {!! $errors->first('marca', '<span class="help-block">:message</span>') !!}
                      </div>

                      <div class="form-group col-md-12 {{ $errors->has('modelo') ? 'has-error' : '' }}">
                        <label>Modelo</label>
                        <input type="" name="modelo" class="form-control" value="{{ old('modelo') }}"
                        placeholder="Ingresa aquí el tipo de equipo">
                        {!! $errors->first('modelo', '<span class="help-block">:message</span>') !!}
                      </div>

                      <div class="form-group col-md-12 {{ $errors->has('n_serie') ? 'has-error' : '' }}">
                        <label># Serie</label>
                        <input type="" name="n_serie" class="form-control" value="{{ old('n_serie') }}"
                        placeholder="Ingresa aquí el tipo de equipo">
                        {!! $errors->first('n_serie', '<span class="help-block">:message</span>') !!}
                      </div>

                      <div class="form-group">
                        <label>Fecha de publicación</label>

                      <div class="form-group col-md-12 {{ $errors->has('fecha_manten') ? 'has-error' : '' }}">
                      <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                        <input name="fecha_manten"
                        type="text"
                        class="form-control pull-right"
                        value="{{ old('fecha_manten') }}" 
                        id="datepicker">
                      </div>
                        {!! $errors->first('fecha_manten', '<span class="help-block">:message</span>') !!}
                      </div>

                   <!--    <div class="form-group col-md-12 {{ $errors->has('n_serie') ? 'has-error' : '' }}">
                        <label>Nombre de Usuario</label>
                        <input type="" name="nombre" class="form-control" value="{{ old('nombre') }}"
                        placeholder="Ingresa aquí nombre de usuario">
                        {!! $errors->first('nombre', '<span class="help-block">:message</span>') !!}
                      </div> -->
                      
                     


              </div>
              <!-- /.box-body -->

               <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block">Guardar</button>
              </div>
          
          </div>
          <!-- /.box -->

         

</div>

</form>

@stop

@push('styles')

<!-- Select2 -->
 <link rel="stylesheet" href="{{ asset('/adminlteblog/bower_components/select2/dist/css/select2.min.css') }}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

@endpush

@push('scripts')

<!-- Select2 -->
<!-- <script src="{{ asset('/adminlteblog/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('/adminlteblog/bower_components/ckeditor/ckeditor.js') }}"></script> -->
      <!-- bootstrap datepicker -->
<script src="/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  
  $('#datepicker').datepicker({
      language: "es",
      autoclose: true,
      format: 'dd-mm-yyyy',
      todayHighlight: true
      
    });

    /*$('.select2').select2();
    //CKEDITORS
    CKEDITOR.replace('editor')
*/
</script>

@endpush