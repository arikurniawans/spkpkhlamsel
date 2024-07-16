@extends('layouts.app')

@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
                <div class="page-header mt-5">
					<div class="row">
						<div class="col">
							<h3 class="page-title">{{$title}}</h3>
                        </div>
						<div class="col text-right">
							<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#modalTambah"><i class="fas fa-plus"></i> Tambah Data</button>
						</div>
					</div>
				</div>

				@if(session('success'))
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success!</strong> {{ session('success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				@endif

				<div class="row">
                <div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="tableKriteria" class="datatable table table-stripped">
										<thead>
										<tr>
											<th>NIK</th>
											<th>Nama Penduduk</th>
											<th>Jenis Kelamin</th>
											<th>Dusun</th>
											<th>Aksi</th>
										</tr>
										</thead>
										<tbody>
										@foreach($data_penduduk as $penduduk)
											<tr>
												<td>{{ $penduduk->nik }}</td>
												<td>{{ $penduduk->nama_penduduk }}</td>
												<td>{{ $penduduk->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
												<td>{{ $penduduk->dusun }}</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#modalEdit{{ $penduduk->id }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
															<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal{{ $penduduk->id }}"><i class="fas fa-trash-alt m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>

											<!-- Modal Edit Penduduk -->
											<div id="modalEdit{{ $penduduk->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{ $penduduk->id }}" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalEditLabel{{ $penduduk->id }}">Edit Data Penduduk</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{ route('penduduk.update', $penduduk->id) }}" method="POST">
															@csrf
															@method('PUT')
															<div class="modal-body">
																<div class="form-group">
																	<label for="nik">NIK</label>
																	<input type="text" class="form-control" id="nik" name="nik" value="{{ $penduduk->nik }}" readonly>
																</div>
																<div class="form-group">
																	<label for="nama_penduduk">Nama Penduduk</label>
																	<input type="text" class="form-control" id="nama_penduduk" name="nama_penduduk" value="{{ $penduduk->nama_penduduk }}" required>
																</div>
																<div class="form-group">
																	<label for="jenis_kelamin">Jenis Kelamin</label>
																	<select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
																		<option value="L" {{ $penduduk->jenis_kelamin === 'L' ? 'selected' : '' }}>Laki-laki</option>
																		<option value="P" {{ $penduduk->jenis_kelamin === 'P' ? 'selected' : '' }}>Perempuan</option>
																	</select>
																</div>
																<div class="form-group">
																	<label for="dusun">Dusun</label>
																	<input type="text" class="form-control" id="dusun" name="dusun" value="{{ $penduduk->dusun }}" required>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																<button type="submit" class="btn btn-primary">Simpan Perubahan Data</button>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!-- End Modal Edit Penduduk -->

											<!-- Modal Delete Penduduk -->
											<div id="deleteModal{{ $penduduk->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $penduduk->id }}" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="deleteModalLabel{{ $penduduk->id }}">Konfirmasi Hapus Data</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Apakah Anda yakin ingin menghapus data penduduk {{ $penduduk->nama_penduduk }}?</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
															<form action="{{ route('penduduk.destroy', $penduduk->id) }}" method="POST" style="display: inline;">
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger">Hapus</button>
															</form>
														</div>
													</div>
												</div>
											</div>

										@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Data Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('penduduk.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_penduduk">Nama Penduduk</label>
                        <input type="text" class="form-control" id="nama_penduduk" name="nama_penduduk" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dusun">Dusun</label>
                        <input type="text" class="form-control" id="dusun" name="dusun" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tableKriteria').DataTable();
    });

	// function confirmDelete(id) {
    //     Swal.fire({
    //         title: 'Konfirmasi Hapus Data',
    //         text: "Apakah Anda yakin ingin menghapus data ini?",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#d33',
    //         cancelButtonColor: '#3085d6',
    //         confirmButtonText: 'Hapus',
    //         cancelButtonText: 'Batal'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // Trigger form submission
    //             document.getElementById('deleteForm'+id).submit();
    //         }
    //     });
    // }
	
</script>
@endpush
