@extends ('layout.app')

@section('title')
    Guru
@endsection

@section('content')

     <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Daftar Isi Guru</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Daftar Isi Guru</li>
                                </ol>
                            </div>
                        </div>
                    </div>
        </section> 

        <section class="content">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Guru</h3>
                            <div class="card-tools">
                                <button type="button" onclick="addForm('{{route('guru.index')}}')" class="btn btn-tool">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <Table class="table table-hover-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Mapel</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </Table>
                        </div>
                    </div>
        </section> 
        @includeIf('guru.form')
@endsection

@push('script')
<script>
    function addForm(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Tambah Data Siswa');
    }

    function editData(url){
        $('#modalForm').modal('show');
        $('#modalForm .modal-title').text('Edit Data Siswa');
    }
</script>
@endpush