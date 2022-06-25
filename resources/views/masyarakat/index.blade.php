@extends('layouts.app')
@section('head')
@section('title', 'Pengaduan Masyarakat')
@section('content')
<!--===== HOME =====-->
<section class="home bd-grid" id="home">
    <div class="home__data">
      <h1 class="home__title">
        Selamat Datang Di Website,<br /> <span class="home__title-color">Perngaduan</span>
        Masyarakat
      </h1>
      <!-- Button trigger modal -->

      <button type="button" class="btn btn-primary button" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajukan Pengaduan</button>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal Add Pengaduan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('masyarakat.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('post')
                    <div class="mb-3">
                    <label class="col-form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" readonly>
                    </div>
<<<<<<< HEAD
                    <div class="mb-3">
                    <label class="col-form-label">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukan NIK Anda" required>
                    </div>
                    <div class="mb-3">
                    <label class="col-form-label">Isi Laporan</label>
                    <textarea class="form-control" id="isi_laporan" name="isi_laporan" placeholder="Isi Laporan" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Status</label>
                        <input type="text" class="form-control" id="status" name="status" value="Pending" readonly>
=======
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <table class="table" id="data">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">No Telpon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $petugas)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $petugas->nama }}</td>
                                                <td>{{ $petugas->username }}</td>
                                                <td>{{ $petugas->telp }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
>>>>>>> 036b98ff35a36ffd58b5de97d84534e2fd1b654e
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
            </div>
      </div>
    </div>
  </div>


    </div>
    <div class="home__social">
      <a
        href="https://www.instagram.com/azriel_fauzi.h/"
        target="_blank"
        class="home__social-icon"
        ><i class="bx bxl-instagram"></i
      ></a>
      <a
        href="https://github.com/Azrielfhr2"
        target="_blank"
        class="home__social-icon"
        ><i class="bx bxl-github"></i
      ></a>
    </div>

    <div class="home__img">
      <!-- <img src="assets/img/prof1.jpeg" alt="" /> -->
    </div>
  </section>

  <!--===== ABOUT =====-->
  <section class="about section" id="about">
    <h2 class="section-title">About</h2>

    <div class="about__container bd-grid">
      <div>
        <h2 class="about__subtitle">Apa itu pengaduan masyarakat?</h2>
        <p class="about__text">
            laporan dari masyarakat mengenai adanya indikasi terjadinya penyimpangan, korupsi, kolusi dan nepotisme yang dilakukan aparat pemerintah daerah dalam penyelenggaraan pemerintahan.
        </p>
      </div>
    </div>
  </section>

  <!--===== WORK =====-->
  <section class="work section" id="work">
    <h2 class="section-title">Pengaduan</h2>
    <div class="work__container bd-grid">
        @if ($pengaduan->count() > 0)
        @foreach ($pengaduan as $pengadu)
            <div class="work__img">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images/pengaduan/' . $pengadu->foto) }}" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title">{{ $pengadu->tanggal }}</h5>
                    <p class="card-text">{{ $pengadu->isi_laporan }}</p>
                    <h3 class="card-title">{{ $pengadu->status}}</h3>
                    </div>
                </div>
            </div>
        @endforeach
        @else
        <div class="work__img">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Belum Ada Pengaduan</h5>
                </div>
            </div>
        @endif
    </div>
  </section>
@endsection
@section('script')

@endsection
