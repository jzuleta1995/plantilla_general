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
              </tr>
          @endforeach
        </tbody>
    </table>
    {!! $abonos->render() !!}
</div>