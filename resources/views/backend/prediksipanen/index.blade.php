@extends('layouts.master')

@section('header-title', 'Prediksi Panen')

@section('css')
@endsection

@section('content')
<div class="content-body">
<div class="container-fluid">
    <div class="row">
    <div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <form action="" class="d-flex justify-content-between w-100 flex-wrap">
                    <div class="form-group mr-3">
                        <label for="provinsiSelect">Nama Provinsi</label>
                        <select name="provinsi" class="form-control" id="provinsiSelect" onchange="updateCities()">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinces as $province => $cities)
                                        <option value="{{ $province }}">{{ $province }}</option>
                                    @endforeach
                                </select>
                    </div>
                    <div class="form-group mr-3">
                        <label for="kabupatenSelect">Nama Kabupaten</label>
                        <select name="kabupaten" class="form-control" id="kabupatenSelect">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                    </div>
                    <div class="form-group mr-3">
                        <label for="bulanSelect">Bulan</label>
                        <select class="form-control" id="bulanSelect">
                        <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <label for="tahunSelect">Tahun</label>
                        <select name="tahun" class="form-control" id="tahunSelect">
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2024">2021</option>
                                        <option value="2023">2020</option>
                                        <option value="2022">2019</option>
                                    </select>
                    </div>
                    <button type="button" class="btn btn-primary align-self-end" style="background-color: #96a78d;">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-6 col-md-12">
    <div class="row">
        <div class="col-md-6 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Jenis Tanaman Pangan</h4>
                                <hr>
								<h3>Padi, Jagung, Ubi</h3>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Prediksi Panen</h4>
                                <hr>
								<h4>6.3 ton/ha</h4>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Varietas padi yang direkomendasikan</h4>
                                <hr>
								<h4>inpari 32</h4>
							</div>
						</div>
                    </div>
</div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="row">
        <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h3 class="card-title">Kelebihan</h3>
                                <hr>
								<h4>1. Tahan penyakit kresek</h4>
                                <h4>2. Tahan penyakit bias</h4>
                                <h4>3. Tonase tinggi</h4>
                                <h4>4. Usia panen cepat</h4>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h3 class="card-title">Kekurangan</h3>
                                <hr>
								<h4>1. Rentan hama wereng</h4>
                                <h4>2. Rentan hama sundep</h4>
                                <h4>3. Rentan roboh</h4>
							</div>
						</div>
                    </div>
                    <div class="col-md-6 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Contoh Tanaman</h4>
								<img src="{{ asset('backend/images/padi.jpeg') }}" alt="Padi" width="300px" height="250px" style="border-radius: 10px;">
							</div>
						</div>
                    </div>
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert2.min.js')}}"></script>


@endsection

@section('script')
<script>
const citiesByProvince = {
    'Aceh': ['Banda Aceh', 'Sabang', 'Lhokseumawe', 'Langsa', 'Sigli', 'Bireuen'],
    'Sumatera Utara': ['Medan', 'Binjai', 'Pematangsiantar', 'Sibolga', 'Tebing Tinggi', 'Kisaran'],
    'Sumatera Barat': ['Padang', 'Solok', 'Bukittinggi', 'Payakumbuh', 'Pariaman'],
    'Riau': ['Pekanbaru', 'Dumai', 'Bengkalis', 'Siak', 'Pangkalan Kerinci'],
    'Jambi': ['Jambi', 'Sungai Penuh', 'Muaro Jambi'],
    'Sumatera Selatan': ['Palembang', 'Prabumulih', 'Lubuklinggau', 'Baturaja'],
    'Bengkulu': ['Bengkulu', 'Rejang Lebong', 'Seluma'],
    'Lampung': ['Bandar Lampung', 'Metro', 'Pringsewu'],
    'DKI Jakarta': ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur'],
    'Jawa Barat': ['Bandung', 'Bogor', 'Bekasi', 'Cirebon', 'Depok', 'Tasikmalaya', 'Sumedang', 'Sukabumi'],
    'Jawa Tengah': ['Semarang', 'Solo', 'Magelang', 'Tegal', 'Salatiga', 'Pekalongan'],
    'DI Yogyakarta': ['Yogyakarta', 'Bantul', 'Sleman', 'Gunungkidul', 'Kulon Progo'],
    'Jawa Timur': ['Surabaya', 'Malang', 'Kediri', 'Banyuwangi', 'Jember', 'Bondowoso', 'Sidoarjo'],
    'Bali': ['Denpasar', 'Badung', 'Gianyar', 'Karangasem', 'Buleleng'],
    'Nusa Tenggara Barat': ['Mataram', 'Bima', 'Sumbawa Besar'],
    'Nusa Tenggara Timur': ['Kupang', 'Ruteng', 'Maumere'],
    'Kalimantan Barat': ['Pontianak', 'Singkawang', 'Sambas'],
    'Kalimantan Tengah': ['Palangka Raya', 'Sampit', 'Pangkalan Bun'],
    'Kalimantan Selatan': ['Banjarmasin', 'Banjarbaru', 'Martapura'],
    'Kalimantan Timur': ['Samarinda', 'Balikpapan', 'Bontang'],
    'Kalimantan Utara': ['Tarakan', 'Nunukan', 'Malinau'],
    'Sulawesi Utara': ['Manado', 'Bitung', 'Tomohon'],
    'Sulawesi Tengah': ['Palu', 'Donggala', 'Poso'],
    'Sulawesi Selatan': ['Makassar', 'Parepare', 'Palopo'],
    'Sulawesi Tenggara': ['Kendari', 'Baubau', 'Buton'],
    'Gorontalo': ['Gorontalo', 'Boalemo', 'Pohuwato'],
    'Maluku': ['Ambon', 'Tual'],
    'Maluku Utara': ['Ternate', 'Tidore'],
    'Papua Barat': ['Manokwari', 'Sorong', 'Kaimana'],
    'Papua': ['Jayapura', 'Merauke', 'Sorong'],
};


document.querySelector('button[type="button"]').addEventListener('click', function() {
    const provinsi = document.getElementById('provinsiSelect').value;
    const kabupaten = document.getElementById('kabupatenSelect').value;
    const bulan = document.getElementById('bulanSelect').value;
    const tahun = document.getElementById('tahunSelect').value;

    // Lakukan AJAX request ke controller
    fetch(`/prediksi-panen/search?provinsi=${provinsi}&kabupaten=${kabupaten}&bulan=${bulan}&tahun=${tahun}`)
        .then(response => response.json())
        .then(data => {
            // Update tampilan dengan data yang diterima
            document.querySelector('h3[class="card-title"]').textContent = data.tanaman_pangan;
            document.querySelector('h4[class="card-title"]').textContent = data.prediksi_panen + ' ton/ha';
            // ... update elemen lainnya dengan data.varietas, data.kelebihan, data.kekurangan, dan data.gambar
        })
        .catch(error => {
            console.error('Error:', error);
            // Tampilkan pesan error kepada pengguna jika terjadi kesalahan
        });
});
</script>
@endsection