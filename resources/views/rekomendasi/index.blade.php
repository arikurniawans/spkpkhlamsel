@extends('layouts.app')

@section('content')
<div class="page-wrapper">
			<div class="content container-fluid">
                <div class="page-header mt-5">
					<div class="row">
						<div class="col">
							<h3 class="page-title">{{$title}}</h3>
                        </div>
					</div>
				</div>

                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$formtitle1}}</h4>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table id="tableAwal" class="datatable table table-stripped">
                        <tr>
											<th>NIK</th>
											<th>Nama Penduduk</th>
											<th>Penghasilan Bulanan (C1)</th>
											<th>Jumlah Anak Usia Dini (C2)</th>
											<th>Jumlah Anak Sekolah (C3)</th>
											<th>Lansia dalam Keluarga (C4)</th>
											<th>Penyandang Disabilitas (C5)</th>
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
											</tr>
                                        @endforeach
                            </tbody>
                        </table>
                        </div>

                        </div>

                    </div>
            </div>
         </div>


         <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$formtitle2}}</h4>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table id="tableAwal" class="datatable table table-stripped">
                        <tr>
											<th>NIK</th>
											<th>Nama Penduduk</th>
											<th>Penghasilan Bulanan (C1)</th>
											<th>Jumlah Anak Usia Dini (C2)</th>
											<th>Jumlah Anak Sekolah (C3)</th>
											<th>Lansia dalam Keluarga (C4)</th>
											<th>Penyandang Disabilitas (C5)</th>
										</tr>
										</thead>
										<tbody>
										@foreach($data_alternatif as $alt2)
											<tr>
												<td>{{ $alt2->nik }}</td>
												<td>{{ $alt2->nama_penduduk }}</td>
												<td>{{ $alt2->c1_bobot }}</td>
												<td>{{ $alt2->c2_bobot }}</td>
												<td>{{ $alt2->c3_bobot }}</td>
												<td>{{ $alt2->c4_bobot }}</td>
												<td>{{ $alt2->c5_bobot }}</td>
											</tr>
                                        @endforeach
                                            <tr class="table-warning">
                                                <td colspan="2"><strong>Nilai Max / Min</strong></td>
                                                <td>{{$c1_bobot_min}}</td>
                                                <td>{{$c2_bobot_max}}</td>
                                                <td>{{$c3_bobot_max}}</td>
                                                <td>{{$c4_bobot_max}}</td>
                                                <td>{{$c5_bobot_max}}</td>
                                            </tr>

                            </tbody>
                        </table>
                        </div>

                        </div>

                    </div>
            </div>
         </div>

         <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{$formtitle3}}</h4>
                        </div>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table id="tableAwal" class="datatable table table-stripped">
                        <tr>
											<th>NIK</th>
											<th>Nama Penduduk</th>
											<th>Penghasilan Bulanan (C1)</th>
											<th>Jumlah Anak Usia Dini (C2)</th>
											<th>Jumlah Anak Sekolah (C3)</th>
											<th>Lansia dalam Keluarga (C4)</th>
											<th>Penyandang Disabilitas (C5)</th>
										</tr>
										</thead>
										<tbody>
										@foreach($data_alternatif as $alt3)
											<tr>
												<td>{{ $alt3->nik }}</td>
												<td>{{ $alt3->nama_penduduk }}</td>
												<td>{{ $c1_bobot_min / $alt3->c1_bobot }}</td>
												<td>{{ $alt3->c2_bobot / $c2_bobot_max }}</td>
												<td>{{ $alt3->c3_bobot / $c3_bobot_max }}</td>
												<td>{{ $alt3->c4_bobot / $c4_bobot_max }}</td>
												<td>{{ $alt3->c5_bobot / $c5_bobot_max }}</td>
											</tr>
                                        @endforeach

                            </tbody>
                        </table>
                        </div>

                        </div>

                    </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$formtitle4}}</h4>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive">
                    <table id="tableAwal" class="datatable table table-stripped">
                    <tr>
                                        <th>NIK</th>
                                        <th>Nama Penduduk</th>
                                        <th>Perankingan SAW</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        // Buat array untuk menyimpan hasil perhitungan beserta data lainnya
                                        $sortedResults = [];

                                        // Iterasi untuk menghitung dan menyimpan hasil perhitungan
                                        foreach ($data_alternatif as $alt4) {
                                            $nilai = ($normalisasi_bobots['bobot1'] * ($c1_bobot_min / $alt4->c1_bobot)) +
                                                    ($normalisasi_bobots['bobot2'] * ($alt4->c2_bobot / $c2_bobot_max)) +
                                                    ($normalisasi_bobots['bobot3'] * ($alt4->c3_bobot / $c3_bobot_max)) +
                                                    ($normalisasi_bobots['bobot4'] * ($alt4->c4_bobot / $c4_bobot_max)) +
                                                    ($normalisasi_bobots['bobot5'] * ($alt4->c5_bobot / $c5_bobot_max));

                                            // Simpan data ke dalam array
                                            $sortedResults[] = [
                                                'nik' => $alt4->nik,
                                                'nama_penduduk' => $alt4->nama_penduduk,
                                                'nilai' => $nilai,
                                            ];
                                        }

                                        // Urutkan array berdasarkan nilai (descending)
                                        usort($sortedResults, function ($a, $b) {
                                            return $b['nilai'] <=> $a['nilai'];
                                        });

                                        // Tentukan nilai tertinggi
                                        $nilai_tertinggi = $sortedResults[0]['nilai'] ?? null;
                                    @endphp

                                    @foreach ($sortedResults as $result)
                                        <tr class="{{ $result['nilai'] === $nilai_tertinggi ? 'table-success' : '' }}">
                                            <td>{{ $result['nik'] }}</td>
                                            <td>{{ $result['nama_penduduk'] }}</td>
                                            <td>{{ $result['nilai'] }}</td>
                                        </tr>
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
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#tableAwal').DataTable();
    });

</script>
@endpush
