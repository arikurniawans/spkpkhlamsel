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

				@if(session('error'))
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Error!</strong> {{ session('error') }}
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
											<th>Penghasilan Bulanan (C1)</th>
											<th>Jumlah Anak Usia Dini (C2)</th>
											<th>Jumlah Anak Sekolah (C3)</th>
											<th>Lansia dalam Keluarga (C4)</th>
											<th>Penyandang Disabilitas (C5)</th>
											<th>Aksi</th>
										</tr>
										</thead>
										<tbody>
										@foreach($data_alternatif as $alt)
											<tr>
												<td>{{ $alt->nik }}</td>
												<td>{{ $alt->nama_penduduk }}</td>												
												<td>{{ $alt->c1_nama }}</td>
												<td>{{ $alt->c2_nama }}</td>
												<td>{{ $alt->c3_nama }}</td>
												<td>{{ $alt->c4_nama }}</td>
												<td>{{ $alt->c5_nama }}</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v ellipse_color"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#modalEdit{{ $alt->id_alternatif }}"><i class="fas fa-pencil-alt m-r-5"></i> Edit</a>
															<a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#deleteModal{{ $alt->id_alternatif }}"><i class="fas fa-trash-alt m-r-5"></i> Delete</a>
														</div>
													</div>
												</td>
											</tr>

											<!-- Modal Edit Data -->
											<div class="modal fade" id="modalEdit{{ $alt->id_alternatif }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{ $alt->id_alternatif }}" aria-hidden="true">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="modalEditLabel">Edit Data Alternatif</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form action="{{ route('alternatif.update', ['id' => $alt->id_alternatif]) }}" method="POST">
															@csrf
															@method('PUT')
															<div class="modal-body">
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="small">Penduduk (Alternatif)</label>
																			<select class="form-control select2" name="nik">
																				<option value="">- Pilih Penduduk -</option>
																				<option value="{{ $alt->id_penduduk }}" selected>{{ $alt->nik }} - {{ $alt->nama_penduduk }}</option>
																				@foreach ($data_penduduk as $orang)
																					<option value="{{ $orang->id }}">{{ $orang->nik }} - {{ $orang->nama_penduduk }}</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="form-group">
																			<label class="small">Jumlah Anak Usia Dini (Benefit) - C2</label>
																			<select class="form-control select2" name="c2">
																				<option value="">- Pilih Kriteria (C2) -</option>
																				<option value="{{ $alt->c2_id }}" selected>{{ $alt->c2_nama }} (Nilai Bobot: {{ $alt->c2_bobot }})</option>
																				@foreach ($data_c2 as $dtc2)
																					<option value="{{ $dtc2->id_kriteria }}">{{ $dtc2->sub_kriteria }} (Nilai Bobot: {{ $dtc2->bobot }})</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="form-group">
																			<label class="small">Lansia dalam Keluarga (Benefit) - C4</label>
																			<select class="form-control select2" name="c4">
																				<option value="">- Pilih Kriteria (C4) -</option>
																				<option value="{{ $alt->c4_id }}" selected>{{ $alt->c4_nama }} (Nilai Bobot: {{ $alt->c4_bobot }})</option>
																				@foreach ($data_c4 as $dtc4)
																					<option value="{{ $dtc4->id_kriteria }}" {{ $alt->id_kriteria_c4 == $dtc4->id_kriteria ? 'selected' : '' }}>{{ $dtc4->sub_kriteria }} (Nilai Bobot: {{ $dtc4->bobot }})</option>
																				@endforeach
																			</select>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="form-group">
																			<label class="small">Penghasilan Bulanan (Cost) - C1</label>
																			<select class="form-control select2" name="c1">
																				<option value="">- Pilih Kriteria (C1) -</option>
																				<option value="{{ $alt->c1_id }}" selected>{{ $alt->c1_nama }} (Nilai Bobot: {{ $alt->c1_bobot }})</option>
																				@foreach ($data_c1 as $dtc1)
																					<option value="{{ $dtc1->id_kriteria }}" {{ $alt->id_kriteria_c1 == $dtc1->id_kriteria ? 'selected' : '' }}>{{ $dtc1->sub_kriteria }} (Nilai Bobot: {{ $dtc1->bobot }})</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="form-group">
																			<label class="small">Jumlah Anak Sekolah (Benefit) - C3</label>
																			<select class="form-control select2" name="c3">
																				<option value="">- Pilih Kriteria (C3) -</option>
																				<option value="{{ $alt->c3_id }}" selected>{{ $alt->c3_nama }} (Nilai Bobot: {{ $alt->c3_bobot }})</option>
																				@foreach ($data_c3 as $dtc3)
																					<option value="{{ $dtc3->id_kriteria }}" {{ $alt->id_kriteria_c3 == $dtc3->id_kriteria ? 'selected' : '' }}>{{ $dtc3->sub_kriteria }} (Nilai Bobot: {{ $dtc3->bobot }})</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="form-group">
																			<label class="small">Penyandang Disabilitas (Benefit) - C5</label>
																			<select class="form-control select2" name="c5">
																				<option value="">- Pilih Kriteria (C5) -</option>
																				<option value="{{ $alt->c5_id }}" selected>{{ $alt->c5_nama }} (Nilai Bobot: {{ $alt->c5_bobot }})</option>
																				@foreach ($data_c5 as $dtc5)
																					<option value="{{ $dtc5->id_kriteria }}" {{ $alt->id_kriteria_c5 == $dtc5->id_kriteria ? 'selected' : '' }}>{{ $dtc5->sub_kriteria }} (Nilai Bobot: {{ $dtc5->bobot }})</option>
																				@endforeach
																			</select>
																		</div>
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
															</div>
														</form>
													</div>
												</div>
											</div>


											<!-- Modal Delete Alternatif -->
											<div id="deleteModal{{ $alt->id_alternatif }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $alt->id_alternatif }}" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="deleteModalLabel{{ $alt->id_alternatif }}">Konfirmasi Hapus Data</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>Apakah Anda yakin ingin menghapus data alternatif {{ $alt->nama_penduduk }}?</p>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
															<form action="{{ route('alternatif.destroy', ['id' => $alt->id_alternatif]) }}" method="POST" style="display: inline;">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahLabel">Tambah Data Alternatif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('alternatif.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small">Penduduk (Alternatif)</label>
                                <select class="form-control select2" name="nik">
                                    <option value="">- Pilih Penduduk -</option>
                                    @foreach ($data_penduduk as $orang)
                                        <option value="{{ $orang->id }}">{{ $orang->nik }} - {{ $orang->nama_penduduk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small">Jumlah Anak Usia Dini (Benefit) - C2</label>
                                <select class="form-control select2" name="c2">
                                    <option value="">- Pilih Kriteria (C2) -</option>
                                    @foreach ($data_c2 as $dtc2)
                                        <option value="{{ $dtc2->id_kriteria }}">{{ $dtc2->sub_kriteria }} (Nilai Bobot: {{ $dtc2->bobot }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small">Lansia dalam Keluarga (Benefit) - C4</label>
                                <select class="form-control select2" name="c4">
                                    <option value="">- Pilih Kriteria (C4) -</option>
                                    @foreach ($data_c4 as $dtc4)
                                        <option value="{{ $dtc4->id_kriteria }}">{{ $dtc4->sub_kriteria }} (Nilai Bobot: {{ $dtc4->bobot }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small">Penghasilan Bulanan (Cost) - C1</label>
                                <select class="form-control select2" name="c1">
                                    <option value="">- Pilih Kriteria (C1) -</option>
                                    @foreach ($data_c1 as $dtc1)
                                        <option value="{{ $dtc1->id_kriteria }}">{{ $dtc1->sub_kriteria }} (Nilai Bobot: {{ $dtc1->bobot }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small">Jumlah Anak Sekolah (Benefit) - C3</label>
                                <select class="form-control select2" name="c3">
                                    <option value="">- Pilih Kriteria (C3) -</option>
                                    @foreach ($data_c3 as $dtc3)
                                        <option value="{{ $dtc3->id_kriteria }}">{{ $dtc3->sub_kriteria }} (Nilai Bobot: {{ $dtc3->bobot }})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small">Penyandang Disabilitas (Benefit) - C5</label>
                                <select class="form-control select2" name="c5">
                                    <option value="">- Pilih Kriteria (C5) -</option>
                                    @foreach ($data_c5 as $dtc5)
                                        <option value="{{ $dtc5->id_kriteria }}">{{ $dtc5->sub_kriteria }} (Nilai Bobot: {{ $dtc5->bobot }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
		$('.select2').select2({ 
            width: '100%'
        });
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
