
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive" style="padding-top: 15px;">
                    <table id='tabla_atletas_registrados' class="table table-hover table-bordered table-striped datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Colegio</th>
                                <th>Locacion</th>
                                <th>Dias</th> 
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{ dd($atletas) }}