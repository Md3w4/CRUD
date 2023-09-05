<?php
require_once('dbcontroller.php');
$db = new dbController();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body id="kelas">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="#kelas">Kelas</a>
                    <a class="nav-link" href="#jurusan">Jurusan</a>
                    <a class="nav-link" href="#guru">Guru</a>
                    <a class="nav-link" href="#siswa">Siswa</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- NAVBAR-END -->

    <!-- KELAS -->
    <div class="container">
        <h1 class="text-center text-center mb-5 mt-70">Kelas</h1>
        <div class="row text-center justify-content-center">

            <?php
            $sql = "select * from t_kelas";
            $row = $db->getALL($sql);
            foreach ($row as $value) :
            ?>

                <div class="card-all col-md-4 col-xl-4 mb-5">
                    <div class="card" style="width: 18rem;">
                        <img src="img/kelas/<?php echo $value['f_nama']; ?>.jpg" class="card-img-top" alt="Kelas">
                        <div class="card-body">
                            <h5 class="card-title text-dark">

                                <?php echo $value['f_nama']; ?>

                            </h5>
                        </div>
                    </div>
                </div>

            <?php
            endforeach
            ?>
        </div>
    </div>
    <!-- KELAS-END -->

    <!-- JURUSAN -->
    <div class="container pt-5" id="jurusan">
        <h1 class="text-center text-center mb-5 mt-3">Jurusan</h1>
        <div class="row text-center justify-content-center">

            <?php
            $sql = "select * from t_jurusan";
            $row = $db->getALL($sql);
            foreach ($row as $value) :
            ?>

                <div class="card-all col-md-4 col-xl-4 mb-3 ">
                    <div class="card" style="width: 18rem;">
                        <img src="img/jurusan/<?php echo $value['f_nama']; ?>.jpg" class="card-img-top" alt="Jurusan">
                        <div class="card-body">
                            <h5 class="card-title text-dark">
                                <?php echo $value['f_nama']; ?>
                            </h5>
                            <p class="card-text" style="font-size: 14px;">
                                <?php echo substr($value['f_deskripsi'], 0, 80);
                                echo "..." ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            endforeach
            ?>
        </div>
        <!-- JURUSAN-END -->

        <!-- GURU -->
        <div class="container pt-5" id="guru">
            <h1 class="text-center text-center mb-5 mt-3">Guru</h1>
            <div class="row text -center justify-content-center">

                <?php
                $sql = "select * from t_guru";
                $row = $db->getALL($sql);
                foreach ($row as $value) :
                ?>

                    <div class="card-all col-md-4 col-xl-6 mb-5">
                        <div class="card" style="width: 18rem;">
                            <img src="img/guru/<?php echo $value['f_nama']; ?>.jpg" class="card-img-top" alt="Guru">
                            <div class="card-body">
                                <h5 class="card-title text-dark text-center">

                                    <?php echo $value['f_nama']; ?>

                                </h5>
                            </div>
                        </div>
                    </div>
                <?php
                endforeach
                ?>
            </div>
            <!-- GURU-END -->

            <!-- SISWA -->
            <section class="pt-5" id="siswa">
                <div class="row text-center mb-3">
                    <div class="col">
                        <h2>Siswa</h2>
                    </div>
                </div>

                <div class="row justify-content-center mb-5">
                    <div class="col-8">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Jurusan</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">

                                <?php
                                $i = 1;
                                $sql = "SELECT t_siswa.f_nama, t_kelas.f_nama AS f_kelas, t_jurusan.f_nama AS f_jurusan FROM t_siswa
                                INNER JOIN t_kelas
                                ON t_siswa.f_idkelas=t_kelas.f_idkelas
                                INNER JOIN t_jurusan
                                ON t_siswa.f_idjurusan=t_jurusan.f_idjurusan
                                ORDER BY t_kelas.f_idkelas, t_siswa.f_idsiswa, t_jurusan.f_idjurusan";
                                $row = $db->getALL($sql);
                                foreach ($row as $siswa) :

                                ?>

                                    <tr>
                                        <th scope="row">
                                            <?php echo $i++; ?>
                                        </th>
                                        <td><?php echo $siswa['f_nama'] ?></td>
                                        <td><?php echo $siswa['f_kelas'] ?></td>
                                        <td><?php echo $siswa['f_jurusan'] ?></td>
                                    </tr>

                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
            </section>
            <!-- SISWA-END -->


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>