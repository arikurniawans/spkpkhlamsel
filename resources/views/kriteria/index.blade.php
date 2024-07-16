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
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Penghasilan Bulanan <i>(Cost)</i> - [Kriteria C1]</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered mb-0">
                     <thead>
                        <tr>
                           <th>Sub Kriteria</th>
                           <th>Bobot</th>
                        </tr>
                     </thead>
                     <tbody>
                     @forelse($data_c1 as $c1)
                            <tr>
                                <td>{{ $c1->sub_kriteria }}</td>
                                <td>{{ $c1->bobot }}</td>
                            </tr>
                    @empty
                            <tr>
                                <td colspan="3">Data kriteria tidak ditemukan.</td>
                            </tr>
                    @endforelse

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Jumlah Anak Usia Dini <i>(Benefit)</i> - [Kriteria C2]</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                            <th>Sub Kriteria</th>
                            <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($data_c2 as $c2)
                                <tr>
                                    <td>{{ $c2->sub_kriteria }}</td>
                                    <td>{{ $c2->bobot }}</td>
                                </tr>
                        @empty
                                <tr>
                                    <td colspan="3">Data kriteria tidak ditemukan.</td>
                                </tr>
                        @endforelse

                        </tbody>
                    </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Jumlah Anak Sekolah <i>(Benefit)</i> - [Kriteria C3]</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                <th>Sub Kriteria</th>
                                <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($data_c3 as $c3)
                                    <tr>
                                        <td>{{ $c3->sub_kriteria }}</td>
                                        <td>{{ $c3->bobot }}</td>
                                    </tr>
                            @empty
                                    <tr>
                                        <td colspan="3">Data kriteria tidak ditemukan.</td>
                                    </tr>
                            @endforelse

                            </tbody>
                        </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Lansia dalam Keluarga <i>(Benefit)</i> - [Kriteria C4]</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                <th>Sub Kriteria</th>
                                <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($data_c4 as $c4)
                                    <tr>
                                        <td>{{ $c4->sub_kriteria }}</td>
                                        <td>{{ $c4->bobot }}</td>
                                    </tr>
                            @empty
                                    <tr>
                                        <td colspan="3">Data kriteria tidak ditemukan.</td>
                                    </tr>
                            @endforelse

                            </tbody>
                        </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-6">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">Penyandang Disabilitas <i>(Benefit)</i> - [Kriteria C5]</h4>
            </div>
            <div class="card-body">
               <div class="table-responsive">
               <table class="table table-bordered mb-0">
                     <thead>
                        <tr>
                           <th>Sub Kriteria</th>
                           <th>Bobot</th>
                        </tr>
                     </thead>
                     <tbody>
                     @forelse($data_c5 as $c5)
                            <tr>
                                <td>{{ $c5->sub_kriteria }}</td>
                                <td>{{ $c5->bobot }}</td>
                            </tr>
                    @empty
                            <tr>
                                <td colspan="3">Data kriteria tidak ditemukan.</td>
                            </tr>
                    @endforelse

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection