<div class="text-center bg-red disabled color-palette" style="margin-top: 20px;"><h3> Resumen de pago </h3></div>

<hr>
<div class="col-xs">
    <div class="table-responsive">
        <table class="table" id="resumen-pago-academia">
            <thead>
                <th>Nombre del atleta</th>
                <th>Edad</th>
                <th>Ubicación</th>
                <th>Días de clase</th>
                <th>Horario</th>
                <th>Tarifa</th>
            </thead>

            <tbody>
                
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" class="text-right"><strong>Subtotal:</strong></td>
                    <td><span id="academia_subtotal"></span></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right"><strong>Descuento:</strong></td>
                    <td><span id="academia_descuento"></span></td>
                </tr>
                <tr>
                    <td colspan="5" class="text-right"><strong>Total:</strong></td>
                    <td><span id="academia_total"></span></td>
                </tr>
            </tfoot>
        </table>
    </div>
    
    <div style="padding-bottom: 15px;">
        @foreach($tipos_pago AS $key => $tipo)
            <input type="radio" name="factura[tipo_pago]" value="{{ $key }}" style="padding-right: 15px;"> {{ $tipo }}
        @endforeach    
    </div>
    
</div>

@include('adminlte::layouts.datos_pago')