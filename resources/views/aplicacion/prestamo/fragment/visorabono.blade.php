
<div class="container panel">
    <div class="row">
        <h3 class="text-center">Visor Abonos</h3>
        <hr>
        <table class="table table-hover table-striped table-condensed">
            <thead>
            <th class="text-center">Valor Cuota</th>
            <th class="text-center">Valor Abonado</th>
            <th class="text-center">Tipo Abono</th>
            <th class="text-center">Fecha Abono</th>
            <th class="text-center">Estado Abono</th>
            <th class="text-center">Observación</th>
            </thead>
            <tbody>
            <?php $a = 1; ?>

            @foreach($abonos as $abono)

                  <tr>
                      <td class="text-center">{{ $abono->abono_valor_cuota }}</td>
                      <td class="text-center">{{ $abono->abono_valor }}</td>
                      <td class="text-center"> {{ $abono->abono_tipo_pago }}</td>
                      <td class="text-center">{{ $abono->abono_fecha }}</td>
                      <td class="text-center">{{ $abono->abono_estado }}</td>
                      <td class="text-center">{{ $abono->abono_observacion }}</td>

                  @if($abono->abono_estado=='INACTIVO')
                          <!-- se iguala a cero para que en la proxima iteracion la variable empiece en 1-->
                          <?php if($a==1){$a = 0;} ?>
                      @endif

                   <?php if ($a ==1){ ?>
                          @if( Auth::user()->tipo == 'ADMINISTRADOR' && $abono->abono_estado=='ACTIVO' )
                              <td class="text-center">
                                  <a class="btn btn-danger" data-toggle="modal" data-target="#editModal" onclick="mostrarModalAbono('{{$abono -> id}}','{{$abono -> abono_item}}','{{$abono -> prestamo_id}}')"><span class="glyphicon glyphicon-remove"></span></a>
                              </td>
                          @endif
                      <td class="text-center">
                   <?php }else{ ?>
                    <?php }?>

                  </tr>
                  <?php $a++;  ?>

            @endforeach
            </tbody>
        </table>
        {!! $abonos->render() !!}

    <!-- Edit Modal start -->
        <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('admin/abono/view')}}">

        <div class="modal fade" id="editModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Anular Abono</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('admin/abono/updateAnulaAbono') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="edit_valor_abono">valor abono:</label>
                                    <input type="text" class="form-control" id="edit_valor_abono" name="edit_valor_abono" readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="***********"  >
                                </div>
                                <div class="form-group">
                                    <label for="edit_observacion">Observacion:</label>
                                    <input type="text" class="form-control" id="edit_observacion" name="edit_observacion" >
                                </div>
                            </div>

                            <input type="text" id="edit_id" name="edit_id">abono
                            <input type="text" id="edit_abono_item" name="edit_abono_item">item
                            <input type="text" id="edit_prestamo_id" name="edit_prestamo_id">prestamo

                            <button type="button" onclick="AnularAbono()" class="btn btn-primary">Anular</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="limpiarCampos()">Cerrar</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Edit code ends -->
</div>
