<div class="col-xs">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <th>Cédula</th>
                <th>Nombre y apellido</th>
                <th>Teléfono</th> 
                <th>Red social</th>
                <th>Correo</th>
            </thead>
            <tbody>
                @foreach($alquiler->invitados AS $key => $invitado)
                    <tr>
                        <td>{{ $invitado->cedula }}</td>
                        <td>{{ $invitado->nombres }} {{ $invitado->apellidos }}</td>
                        <td>{{ $invitado->telefono }}</td>
                        <td>{{ $invitado->red_social }}</td>
                        <td>{{ $invitado->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
            
