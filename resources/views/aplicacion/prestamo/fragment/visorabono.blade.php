<div class="container panel">
    <table class="table table-hover table-striped table-condensed">
        <thead>
        <th class="text-center">Valor Cuota</th>
        <th class="text-center">Valor Abonado</th>
        <th class="text-center">Tipo Abono</th>
        <th class="text-center">Fecha Abono</th>
        <th class="text-center">Observación</th>
        </thead>
        <tbody>

          @foreach($abonos as $abono)

              <tr>
                  <td class="text-center">{{ $abono->abono_valor_cuota }}</td>
                  <td class="text-center">{{ $abono->abono_valor }}</td>
                  <td class="text-center"> {{ $abono->abono_tipo_pago }}</td>
                  <td class="text-center">{{ $abono->abono_fecha }}</td>
                  <td class="text-center">{{ $abono->abono_observacion }}</td>
                  <td class="text-center">

                         <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$abono -> id}}')">Anular Abono</button>

                  </td>
                  <td class="text-center">
              </tr>
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
                    <h4 class="modal-title">Editar</h4>
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
                                <label for="edit_observacion">Observacion:</label>
                                <input type="text" class="form-control" id="edit_observacion" name="edit_observacion">
                            </div>
                        </div>

                        <input type="hidden" id="edit_id" name="edit_id">




                        <button type="button" onclick="fun_save()" class="btn btn-default">Modificar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>

            </div>

        </div>
    </div>
    <!-- Edit code ends -->
</div>
