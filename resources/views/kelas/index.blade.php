@extends ('layout.app')

@section('title')
    Kelas
@endsection

@section('content')

     <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Daftar Isi Kelas</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Daftar Isi Kelas</li>
                                </ol>
                            </div>
                        </div>
                    </div>
        </section> 

        <section class="content">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kelas</h3>
                            <div class="card-tools">
                                <button type="button" onclick="addForm(('{{route('kelas.index')}}'))" class="btn btn-tool">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <Table class="table table-hover-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kelas }}</td>
                                            <td>
                                                <button onclick="editData()" class="btn btn-flat btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                                                <a href="#" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </Table>
                        </div>
                    </div>
        </section> 
        @includeIf('kelas.form')
@endsection

@push('script')
<script>
    function addForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Data Kelas');
    }

    function editData(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Data Kelas');
    }
</script>
@endpush