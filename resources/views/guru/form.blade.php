<div class="modal fade" id="modalForm" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog"
    data-backdrop="static" data_keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama Guru</label>
                        <input type="text" autocomplete="off" class="form-control" name="nama" id="nama">
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                             <option value="Perempuan">Perempuan</option>
                             <option value="Laki-Laki">Laki-Laki</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mapel">Mapel</label>
                        <select class="form-control" name="mapel_id" id="mapel_id">
                        @foreach ($mapel as $item)
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                        @endforeach
                    </select>    
                </div>
            </div>
                    <button type="submit" class="btn btn-success btn-flat
                     btn-sm">Simpan</button>
                </form>
            </div>
        </div>

    </div>

</div>
