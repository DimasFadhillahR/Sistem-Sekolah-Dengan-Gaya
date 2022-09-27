@extends ('layout.app')

@section('title')
    Mapel
@endsection

@section('content')

     <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Daftar Isi Mapel</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Daftar Isi Mapel</li>
                                </ol>
                            </div>
                        </div>
                    </div>
        </section> 

        <section class="content">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mapel</h3>
                            <div class="card-tools">
                                <button type="button" onclick="addForm(('{{route('mapel.index')}}'))" class="btn btn-tool">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <Table class="table table-hover-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mapel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mapel as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>
                                                <button onclick="editData('{{ route('mapel.update', $item->id) }}')" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                                <button onclick="deleteData('{{ route('mapel.destroy', $item->id) }}')" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </Table>
                        </div>
                    </div>
        </section> 
        @includeIf('mapel.form')
@endsection

@push('script')
<script>

    let table;

    $(function() {
        table = $('.table').DataTable( {
            proccesing : true,
            autowitdh: false,
            ajax: {
                url: '{{route('mapel.data') }}'
            },
            columns : [
                (data: 'DT_RowIndex'),
                (data: 'nama'),
            ]
        });
    })

    $('#modalForm').on('submit', function(e){
        if(! e.preventDefault()){
            $.post($('#modalForm form').attr('action'), $('#modalForm form').serialize())
            .done((response) => {
                $('#modalForm').modal('hide');
                table.ajax.reloads();
            })
            .fail((errors) => {
                alert('Tidak Dapat Menyimpan Data');
                return;
            })
        }
    })

    function addForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Data Mapel');

        $('#mapelForm form').attr('action', url);
        $('#modalForm [name=_method]').val('post');
    }

    function editData(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Data Mapel');

        $('#modalForm form')[0].reset();
        $('#modalForm form').attr('action', url);
        $('#modalForm [name=_method').val('put');

        $.get(url)
        .done((response) => {
            $('#modalForm [name=nama]').val(response.nama);
        })
        .fail((errors) => {
            alert('Tidak Dapat Menampilkan Data');
            return;
        })
    }

    function deleteData(url) {
        if(confirm('Yakin Akan Menghapus Data ?')) {
            $.post(url, {
                '_token' : $('[name = csrf-token]').attr('content'),
                '_method' : 'delete'
            })
            .done((response) => {
                alert('Data Berhasil Di Hapus');
                return;
            })
            .fail((errors) => {
                alert('Data Gagal Di Hapus!');
                return;
            })
        }
    }
</script>
@endpush