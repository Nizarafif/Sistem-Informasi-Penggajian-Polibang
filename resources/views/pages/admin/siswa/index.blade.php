@extends('layouts.main')
@section('title', 'List Siswa')

@section('content')
    <section class="section custom-section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>List Gaji Dosen</h4>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                                    class="nav-icon fas fa-folder-plus"></i>&nbsp; Tambah Data Dosen</button>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        {{ $message }}
                                    </div>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Dosen</th>
                                            <th>NIP</th>
                                            <th>Jabatan</th>
                                            <th>Gaji</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $result => $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->nama }}</td>
                                                <td>{{ $data->nis }}</td>
                                                <td>{{ $data->kelas_id }}</td>
                                                <td>{{ $data->gaji_mengajar + $data->gaji_tunjangan + $data->lain_lain }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('siswa.show', Crypt::encrypt($data->id)) }}"></a>
                                                        <a href="{{ route('siswa.edit', Crypt::encrypt($data->id)) }}"></a>
                                                        <form method="POST"
                                                            action="{{ route('siswa.destroy', $data->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger btn-sm show_confirm"
                                                                data-toggle="tooltip" title='Delete'
                                                                style="margin-left: 8px"><i
                                                                    class="nav-icon fas fa-trash-alt"></i> &nbsp;
                                                                Hapus</button>

                                                        </form>
                                                        <a  href="/siswa/print-out/{{ $data->id }}" class="btn btn-success btn-sm "
                                                            data-toggle="tooltip" title="Print" style="margin-left: 8px"><i
                                                                class="nav-icon fas fa-print"></i> &nbsp; Print</a >
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah List Gaji Dosen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible show fade">
                                                    <div class="alert-body">
                                                        <button class="close" data-dismiss="alert">
                                                            <span>&times;</span>
                                                        </button>
                                                        @foreach ($errors->all() as $error)
                                                            {{ $error }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <label for="nama">Nama Dosen</label>
                                                <input type="text" id="nama" name="nama"
                                                    class="form-control @error('nama') is-invalid @enderror"
                                                    placeholder="{{ __('Nama Dosen') }}">
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="form-group">
                                                    <label for="nis">NIP</label>
                                                    <input type="number" id="nis" name="nis"
                                                        class="form-control @error('nis') is-invalid @enderror"
                                                        placeholder="{{ __('NIP Dosen') }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telp">No. Telp</label>
                                                    <input type="number" id="telp" name="telp"
                                                        class="form-control @error('telp') is-invalid @enderror"
                                                        placeholder="{{ __('No. Telpon Dosen') }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kelas_id">Jabatan</label>
                                                <select id="kelas_id" name="kelas_id"
                                                    class="select2 form-control @error('kelas_id') is-invalid @enderror">
                                                    <option value="">-- Pilih Jabatan --</option>
                                                    <option value="Rektor">Rektor</option>
                                                    <option value="Dekan">Dekan</option>
                                                    <option value="Kajur">Kajur</option>
                                                    <option value="Kaprodi">Kaprodi</option>
                                                    <option value="Kadep">Kadep</option>
                                                    <option value="Guru Besar">Guru Besar</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                                    placeholder="{{ __('Alamat') }}"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Gaji Mengajar</label>
                                                <input id="gaji_mengajar" name="gaji_mengajar"
                                                    class="form-control @error('gaji_mengajar') is-invalid @enderror"
                                                    placeholder="{{ __('Gaji') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Tunjangan</label>
                                                <input id="gaji_tunjangan" name="gaji_tunjangan"
                                                    class="form-control @error('gaji_tunjangan') is-invalid @enderror"
                                                    placeholder="{{ __('Gaji') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Lain - Lain</label>
                                                <input id="lain_lain" name="lain_lain"
                                                    class="form-control @error('lain_lain') is-invalid @enderror"
                                                    placeholder="{{ __('Gaji') }}">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer br">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Yakin ingin menghapus data ini?`,
                    text: "Data akan terhapus secara permanen!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endpush
