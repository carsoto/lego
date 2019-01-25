<div class="text-center bg-red disabled color-palette" style="margin-top: 20px;"><h3> Resumen de pago </h3></div>
<hr>
<table class="table">
    <thead>
        <th>Cantidad de alumnos a inscribir</th>
        <th>Descripción</th>
        <th>Tarifa</th>
        <th>Subtotal</th>
    </thead>
    <tbody>
        <tr>
            <td><span id="resumen_cantd_alumnos"></span></td>
            <td><span id="resumen_horario"></span></td>
            <td><input type="text" name="pago_tarifa" id="pago_tarifa" style="display: none;"><span id="resumen_tarifa"></span></td>
            <td><span id="resumen_subtotal"></span></td>
        </tr>
        <tr id="tr_descuento" style="display: none;">
            <td colspan="3" class="text-right"><input type="text" name="pago_descuento" id="pago_descuento" style="display: none;"><span id="descuento_aplicado" style="display: none;"></span><span id="resumen_descuento_aplicado"></span></td>

            <td><span id="resumen_descuento"></span></td>
        </tr>
        <tr>
            <td colspan="3" class="text-right"><strong>Total a pagar</strong></td>
            <td><input type="text" name="pago_monto" id="pago_monto" style="display: none;"><span id="resumen_total"></span></td>
        </tr>
    </tbody>
</table>

<div class="col col-lg-4 col-md-4 bg-yellow disabled color-palette" style="padding: 10px;">
    <strong>DATOS BANCARIOS</strong>
    <br><strong>BANCO PICHINCHA</strong>
    <br><strong>Cta. Ahorros</strong> 2203951260
    <br><strong>Titular</strong> Stephanie Saman 
    <br><strong>Cédula</strong> 0915745905
</div>