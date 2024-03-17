<?php

namespace App\Livewire\Member\Pesanan;

use App\Models\Kantor;
use App\Models\Pesanan;
use App\Models\TransaksiPembayaran;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app-layout')]
#[Title('Detail Pesanan')]

class Detail extends Component
{
    public $pesananId;
    public $namaPemesan;
    public $emailPemesan;
    public $noTelpPemesan;
    public $mobilId;
    public $namaMobil;
    public $jenisMobil;
    public $merekMobil;
    public $supir;
    public $totalHarga;
    public $jumlahHari;
    public $totalBayar;
    public $kantor;

    public function mount(int $id)
    {
        $kantor = Kantor::first();
        $this->pesananId    = $id;
        $this->kantor       = $kantor->nama;
        $this->close();
    }

    public function render()
    {
        $data   = Pesanan::with(['mobil', 'profile', 'driver', 'transaksipembayaran'])->findOrFail($this->pesananId);
        return view('livewire.member.pesanan.detail', [
            'data'          => $data,
        ]);
    }

    public function setCheckout()
    {
        $data   = Pesanan::with(['mobil', 'profile', 'driver', 'transaksipembayaran'])->findOrFail($this->pesananId);

        $this->namaPemesan      = $data->profile->nama;
        $this->emailPemesan     = $data->profile->user->email;
        $this->noTelpPemesan    = $data->profile->no_telp;
        $this->mobilId          = $data->mobil->id;
        $this->namaMobil        = $data->mobil->nama_mobil;
        $this->jenisMobil       = $data->mobil->jenismobil->jenis_mobil;
        $this->merekMobil       = $data->mobil->merekmobil->merek_mobil;
        $this->supir            = $data->supir;
        $this->totalHarga       = $data->total_harga;
        $this->jumlahHari       = $data->jumlah_hari;
        $this->totalBayar       = $data->total_bayar;
    }

    public function checkout()
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details'   => array(
                'order_id'      => $this->pesananId,
                'gross_amount'  => $this->totalBayar,
            ),
            'item_details'          => array(
                [
                    'id'            => $this->mobilId,
                    'price'         => $this->totalBayar,
                    'quantity'      => 1,
                    'name'          => $this->namaMobil,
                    'brand'         => $this->merekMobil,
                    'category'      => $this->jenisMobil,
                    'merchant_name' => $this->kantor
                ],
            ),
            'customer_details'      => array(
                'first_name'    => $this->namaPemesan,
                'last_name'     => '',
                'email'         => $this->emailPemesan,
                'phone'         => '+62' . substr($this->noTelpPemesan, 1),
            ),
            'enabled_payments'      => array(
                'permata_va',
                'bca_va',
                'bni_va',
                'bri_va',
                'credit_card',
                'Indomaret',
                'alfamart',
            ),
            'expiry'                => array(
                'unit'          => 'hours',
                'duration'      => 2
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        TransaksiPembayaran::create([
            'pesanan_id'    => $this->pesananId,
            'token'         => $snapToken
        ]);

        session()->flash('success', 'Lanjutkan Pembayaran anda !.');

        $this->close();

        $this->redirectRoute('member-pesanan-detail', ['id' => $this->pesananId]);
    }

    public function close()
    {
        $this->resetExcept(['pesananId']);
        $this->resetErrorBag();
        $this->dispatch('close-modal');
        $this->dispatch('close-toast');
    }
}
