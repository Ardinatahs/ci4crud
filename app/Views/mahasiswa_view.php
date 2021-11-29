<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .container {
            max-width: 800px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container">
        <!-- CARD -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                Data Mahasiswa
            </div>
            <div class="card-body">
                <!-- LOKASI TEXT PENCARIAN -->
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" value ="<?php echo $katakunci ?>" name="katakunci" placeholder="Masukkan Kata Kunci" aria-label="Masukkan Kata Kunci" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>
                <!-- MODAL -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Tambah Data Mahasiswa
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Mahasiswa</h5>
                        <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- KALAU ERROR -->
                        <div class="alert alert-danger error" role="alert" style="display: none;">
                        </div>
                        <!-- KALAU SUKSES -->
                        <div class="alert alert-primary sukses" role="alert" style="display: none;">
                        </div>
                        <!-- FORM INPUT DATA -->
                        <input type="hidden" id="inputId">
                        <div class="mb-3 row">
                            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputNama">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                            <div class="col-sm-10">
                                <select id="inputJurusan" class="form-select">
                                    <option value="Sistem Informasi">Sistem Informasi</option>
                                    <option value="Teknik Informatika">Teknik Informatika</option>
                                    <option value="Sistem Komputer">Sistem Komputer</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAlamat">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" id="tombolSimpan">Simpan</button>
                    </div>
                    </div>
                </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($dataMahasiswa as $k => $v){
                            $nomor = $nomor + 1 ; 
                        ?>
                        <tr>
                            <td><?php echo $nomor ?></td>
                            <td><?php echo $v['nama'] ?></td>
                            <td><?php echo $v['email'] ?></td>
                            <td><?php echo $v['jurusan'] ?></td>
                            <td><?php echo $v['alamat'] ?></td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="edit(<?php echo $v['id'] ?>)">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?php echo $v['id'] ?>)">Delete</button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                    $linkPagination = $pager->links();
                    $linkPagination = str_replace('<li class="active">','<li class="page-item active">', $linkPagination);
                    $linkPagination = str_replace('<li>','<li class="page-item">', $linkPagination);
                    $linkPagination = str_replace("<a", "<a class='page-link'", $linkPagination);
                    echo $linkPagination;
                ?>
            </div>  
        </div>
    </div>
    <!-- SCRIPT JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function hapus($id){
            var result = confirm('Yakin mau melakukan proses delete');
            if (result){
                window.location="<?php echo site_url("mahasiswa/hapus") ?>/" + $id;
            }
        }
        function edit($id){
            $.ajax({
                url:"<?php echo site_url("mahasiswa/edit")?>/"+ $id,
                type: "get",
                success: function(hasil){
                    var $obj = $.parseJSON(hasil);
                    if($obj.id != ''){
                        $('#inputId').val($obj.id);
                        $('#inputNama').val($obj.nama);
                        $('#inputEmail').val($obj.email);
                        $('#inputJurusan').val($obj.jurusan);
                        $('#inputAlamat').val($obj.alamat);
                    }
                }
            });
        }

        function bersihkan(){
            $('#inputId').val('');
            $('#inputNama').val('');
            $('#inputEmail').val('');
            $('#inputAlamat').val('');
        }
        $('.tombol-tutup').on('click', function(){
            if ($('.sukses').is(":visible")){
                window.location.href = "<?php echo current_url(). "?" .$_SERVER['QUERY_STRING']?>";
            }
            $('.alert').hide();
            bersihkan();
        });
        $('#tombolSimpan').on('click', function(){
            var $id = $('#inputId').val();
            var $nama = $('#inputNama').val();
            var $email = $('#inputEmail').val();
            var $jurusan = $('#inputJurusan').val();
            var $alamat = $('#inputAlamat').val();

            $.ajax({
                url: "<?php echo site_url("mahasiswa/simpan") ?>",
                type: "POST",
                data: {
                    id: $id,
                    nama: $nama,
                    email: $email,
                    jurusan: $jurusan,
                    alamat: $alamat
                },
                success: function(hasil){
                    var $obj = $.parseJSON(hasil);
                    if($obj.sukses == false){
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);
                    }else{
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                    }
                }
            });
            bersihkan();
        });
    </script>
</body>
</html>