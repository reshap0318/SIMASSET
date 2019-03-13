<div class="modal" id="edit-{{$dataMaster->id}}">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data Master</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    {!! Form::model($dataMaster, ['route' => ['datamaster.update', $dataMaster->id], 'method' => 'PATCH']) !!}
                    <div class="form-group col-sm-12">
                        {!! Form::label('Nama', 'Nama :') !!}
                        {!! Form::text('nama_asset', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-sm-12">
                        {!! Form::label('Keterangan', 'Keterangan :') !!}
                        {!! Form::select('keteragan', ['Tetap' => 'Tetap', 'Lancar' => 'Lancar'],null,  ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>