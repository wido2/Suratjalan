<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Address;
use Filament\Forms\Get;
use Filament\Forms\Set;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Livewire\ViewKendaraans;
use Filament\Infolists\Infolist;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Tabs;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Wizard\Step;
use Filament\Infolists\Components\TextEntry;
use App\Models\SuratJalan as ModelsSuratJalan;
use Filament\Forms\Components\Fieldset;
use Filament\Infolists\Contracts\HasInfolists;
use Illuminate\Support\Carbon as SupportCarbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Filament\Infolists\Concerns\InteractsWithInfolists;

use function PHPUnit\Framework\isEmpty;

class SuratJalan extends Controller
{
    static function getFormSuratJalan(): array
    {
        return [
            Wizard::make([
                Step::make('Informasi ')
                    ->icon('heroicon-o-queue-list')
                    ->description('Pengirim')
                    ->schema([
                        TextInput::make('nomor_surat_jalan')
                            ->required()
                            ->readOnly()
                            ->default(NomorSuratJalan::generate(ModelsSuratJalan::count() + 1))
                            ->label('Nomor Surat Jalan'),
                        DatePicker::make('tanggal_pengiriman')->label('Tanggal Pengiriman')->required()->default(now())->format('Y-m-d')->native(false),
                        Select::make('user_id')
                            ->preload()
                            ->searchable()
                            ->required()
                            ->label('Pengirim')
                            ->default(Auth::user()->id)
                            ->relationship('user', 'name'),
                    ]),
                Step::make('Penerima')
                    ->icon('heroicon-o-map')
                    ->description('Alamat, Kontak')
                    ->schema([Select::make('customer_id')->preload()->reactive()->searchable()->label('Nama Customer')->relationship('customer', 'nama')->required(), Select::make('kontak_id')->preload()->searchable()->required()->relationship('kontak', 'nama', fn(Builder $query, Get $get) => $query->where('customer_id', $get('customer_id'))->where('vendor_id', null))->label('Penerima'), Select::make('address')->columnSpanFull()->searchable()->preload()->required()->placeholder('Pilih Customer terlebih dahulu')->relationship('address', 'street', fn(Builder $query, Get $get) => $query->where('customer_id', $get('customer_id'))->where('address_type', 'Warehouse'))->label('Alamat Penerima')]),

                Step::make('Detail')
                    ->icon('heroicon-o-truck')
                    ->description('Kendaraan')
                    ->schema([
                        Select::make('kendaraan_id')
                            ->preload()
                            ->searchable()
                            // ->reactive()
                            ->live()
                            // ->default(1)

                            ->label('Kendaraan')
                            ->relationship('kendaraan', 'nomor_polisi')
                            ->required(),

                        Fieldset::make('Detail Kendaraan')
                            ->columnSpanFull()
                            ->schema([
                                Placeholder::make('nama')
                                ->live()
                                    ->content(function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        }else {
                                            return $kendaraan? $kendaraan->nama : '';
                                        }
                                    })

                                    ->label('Nama Kendaraan'),
                                Placeholder::make('nomor_polisi')
                                    ->label('Nomor Polisi : ')
                                    ->content(
                                        function (Get $get): string {
                                            $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                            if (!$kendaraan){
                                                return 'Pilih Kendaraan terlebih dahulu';
                                            }else {
                                                return $kendaraan? $kendaraan->nomor_polisi : '';
                                            }
                                        }),
                                Placeholder::make('merk')
                                ->label('Merk : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->merk : '';
                                        }
                                    }),
                                Placeholder::make('tahun_pembuatan')
                                ->label('Tahun Pembuatan : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->tahun_pembuatan : '';
                                        }
                                    }),
                                Placeholder::make('warna')
                                ->label('Warna : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->warna : '';
                                        }
                                    }),
                                Placeholder::make('nomor_rangka')
                                ->label('Nomor Rangka : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->nomor_rangka : '';
                                        }
                                    }),
                                Placeholder::make('nomor_mesin')
                                ->label('Nomor Mesin : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->nomor_mesin : '';
                                        }
                                    }),
                                Placeholder::make('nomor_stnk')
                                ->label('Nomor STNK : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->nomor_stnk : '';
                                        }
                                    }),
                                Placeholder::make('tanggal_stnk')
                                ->label('Tanggal STNK : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->tanggal_stnk : '';
                                        }
                                    }),
                                Placeholder::make('tanggal_bpkb')
                                ->label('Tanggal BPKB : ')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan? $kendaraan->tanggal_bpkb : '';
                                        }
                                    }),
                                Placeholder::make('Vendor')
                                ->label('Vendor')
                                ->content(
                                    function (Get $get): string {
                                        $kendaraan = Kendaraan::find($get('kendaraan_id'));
                                        if (!$kendaraan){
                                            return 'Pilih Kendaraan terlebih dahulu';
                                        } else {
                                            return $kendaraan->vendor? $kendaraan->vendor->nama : '';
                                        }
                                    }),
                                




                            ]),
                    ]),

                Step::make('Lampiran')
                    ->icon('heroicon-o-paper-clip')
                    ->description('Scan')
                    ->schema([FileUpload::make('scan_surat')->label('Lampiran')->multiple()->required()->maxFiles(5), FileUpload::make('lampiran')->label('lampiran')->multiple()->required()->maxFiles(5)]),

                Step::make('Barang')
                    ->icon('heroicon-o-squares-plus')
                    ->description('Items')
                    ->schema([
                        Repeater::make('barangs')
                            ->relationship()
                            ->schema([Select::make('produk_id')->required()->searchable()->preload()->relationship('produk', 'nama'), Select::make('satuan_id')->required()->searchable()->preload()->relationship('satuan', 'nama'), TextInput::make('deskripsi')]),
                    ]),
            ])
                ->startOnStep(3)
                ->columnSpanFull(),
        ];
    }

    static function getTableSuratJalan(): array
    {
        return [TextColumn::make('nomor_surat_jalan')->searchable()->sortable(), TextColumn::make('customer.nama')->searchable()->sortable(), TextColumn::make('kontak.nama')->searchable()->sortable(), TextColumn::make('address')->searchable()->limit(50)->sortable(), TextColumn::make('user.name')->searchable()->sortable(), TextColumn::make('tanggal_pengiriman')->sortable(), TextColumn::make('kendaraan.nomor_polisi')->searchable()->sortable(), ImageColumn::make('scan_surat')->circular()->stacked()->limit(3)->limitedRemainingText(), ImageColumn::make('lampiran')->circular()->limit()->limitedRemainingText()->stacked()];
    }
}
