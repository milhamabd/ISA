@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

<div>

    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">

                    {{-- session flash --}}
                    @if (session()->has('success'))
                        <x-toast alert="success" message="{{ session()->get('success') }}" />
                    @endif
                    {{-- end session flash --}}

                    {{-- title and button modal add --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title fw-semibold">DATA PESANAN MOBIL</h5>
                    </div>
                    {{-- end title and button modal add --}}

                    {{-- input search --}}
                    <div class="row mb-3 justify-content-between align-items-center">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 60%">
                                <select name="result" id="result" class="form-select" wire:model.live="result">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select name="status" id="status" class="form-control"
                                            wire:model.live="status">
                                            <option value="" selected>---Semua Status---</option>
                                            <option value="pending">Pending</option>
                                            <option value="unpaid">Unpaid</option>
                                            <option value="paid">Paid</option>
                                        </select>
                                        <label for="status">Status Pembayaran</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" placeholder="" name="keyword"
                                            id="keyword" wire:model.live="keyword">
                                        <label for="keyword">Tanggal Pemesanan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end input search --}}

                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle table-hover">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Foto</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Mobil</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Nama Pemesan</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Tgl Pesan</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Tgl Kembali</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Total Bayar</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $value)
                                    @if ($value->pengembalian == null && $value->status_bayar != 'unpaid')
                                        <tr>
                                            <td class="border-bottom-0">
                                                <div class="box-image-table">
                                                    <img src="{{ asset('images/cars/' . $value->mobil->foto) }}"
                                                        alt="..." class="img-thumbnail">
                                                </div>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-normal mb-1">{{ $value->mobil->nama_mobil }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $value->profile->nama }}</h6>
                                                <span class="fw-normal mb-0">{{ $value->profile->jenis_kelamin }}</span>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-normal mb-1">{{ $value->tanggal_pemesanan }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-normal mb-1">{{ $value->tanggal_pengembalian }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-normal mb-1">
                                                    Rp. {{ number_format($value->total_bayar, 0, ',', '.') }}
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                @if ($value->status_bayar == 'paid')
                                                    <p class="text-white badge bg-success">{{ $value->status_bayar }}
                                                    </p>
                                                @else
                                                    <p class="text-white badge bg-danger">{{ $value->status_bayar }}
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="border-bottom-0">
                                                <div class="d-flex justif-content-center gap-2">
                                                    <a href="{{ route('admin-pesanan-show', $value->id) }}"
                                                        class="btn btn-sm btn-secondary">
                                                        <i class="ti ti-info-circle"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                @if (count($data) == 0 || $data[0]->status_bayar != 'pending')
                                    <tr>
                                        <td class="border-bottom-0 text-center" colspan="9">
                                            <h6 class="fw-semibold mb-0">{{ __('Data tidak Ditemukan !') }}</h6>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {{-- pagination --}}
                        <div class="d-flex justify-content-end">
                            {{ $data->links() }}
                        </div>
                        {{-- end pagination --}}
                    </div>
                    {{-- end table --}}

                </div>
                {{-- end card body --}}
            </div>
        </div>
    </div>

    {{-- history pesanan --}}
    <div class="row mt-3">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">

                    {{-- title and button modal add --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title fw-semibold">HISTORI DATA PESANAN MOBIL</h5>
                    </div>
                    {{-- end title and button modal add --}}

                    {{-- input search --}}
                    <div class="row mb-3 justify-content-between align-items-center">
                        <div class="col-md-2">
                            <div class="form-group" style="width: 60%">
                                <select name="historyResult" id="historyResult" class="form-select"
                                    wire:model.live="historyResult">
                                    <option value="5">5</option>
                                    <option value="10" selected>10</option>
                                    <option value="25">25</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <h6 class="fs-5 fw-2">{{ $today }}</h6>
                        </div>
                    </div>
                    {{-- end input search --}}

                    {{-- table --}}
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0 align-middle table-hover">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Foto</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Mobil</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Nama Pemesan</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Tgl Pesan</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Tgl Kembali</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Total Bayar</h6>
                                    </th>
                                    <th>
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($history as $key => $value)
                                    <tr>
                                        <td class="border-bottom-0">
                                            <div class="box-image-table">
                                                <img src="{{ asset('images/cars/' . $value->mobil->foto) }}"
                                                    alt="..." class="img-thumbnail">
                                            </div>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-1">{{ $value->mobil->nama_mobil }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $value->profile->nama }}</h6>
                                            <span class="fw-normal mb-0">{{ $value->profile->jenis_kelamin }}</span>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-1">{{ $value->tanggal_pemesanan }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-1">{{ $value->tanggal_pengembalian }}</h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-normal mb-1">
                                                Rp. {{ number_format($value->total_bayar, 0, ',', '.') }}
                                            </h6>
                                        </td>
                                        <td class="border-bottom-0">
                                            @if ($value->status_bayar == 'paid')
                                                <p class="text-white badge bg-success">{{ $value->status_bayar }}</p>
                                            @else
                                                <p class="text-white badge bg-danger">{{ $value->status_bayar }}</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                @if (count($history) == 0)
                                    <tr>
                                        <td class="border-bottom-0 text-center" colspan="9">
                                            <h6 class="fw-semibold mb-0">{{ __('Data tidak Ditemukan !') }}</h6>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        {{-- pagination --}}
                        <div class="d-flex justify-content-end">
                            {{ $data->links() }}
                        </div>
                        {{-- end pagination --}}
                    </div>
                    {{-- end table --}}

                </div>
                {{-- end card body --}}
            </div>
            {{-- end history pesanan --}}
        </div>
    </div>

</div>


@push('scripts')
    <script>
        window.addEventListener('close-toast', () => {
            setTimeout(() => {
                $('#toast').addClass('d-none')
            }, 3000);
        })
    </script>
@endpush
