<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>basdat_db_f1</title>
</head>

<body>
    <h1>Data Nortif Alumni</h1>

    <?php
    $servername = "localhost:3309";
    $database = "basdat_db_f1";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // echo "Connected successfully";


    // persen kerja
    // jumlah kerja
    $kerja = mysqli_query($conn, "SELECT nama_perusahaan FROM `kerja` WHERE nama_perusahaan IS NOT NULL");
    $jumlah_kerja1 = $kerja->num_rows;

    // jumlah slrh
    $semua_kerja = mysqli_query($conn, "SELECT * FROM `kerja`");
    $jumlah_kerja2 = $semua_kerja->num_rows;

    // persentase kerja
    $persen_kerja = $jumlah_kerja1 / $jumlah_kerja2 * 100;

    echo "Persentase Kerja : " . round($persen_kerja, 2) . "%<br><br>";


    // top 5 kerja
    $top_kerja = mysqli_query($conn, "SELECT COUNT(id_kerja) as id_kerja, nama_perusahaan FROM kerja WHERE nama_perusahaan IS NOT NULL GROUP BY nama_perusahaan ORDER BY COUNT(id_kerja) DESC LIMIT 5;");
    ?>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center flex-column align-items-center">
            <div class="col-lg-10 ">
                <div class="card-shadow mb-4">
                    <!-- <div class="card-header py-2"> -->


                    <!-- </div> -->
                    <div class="card-body text-center">
                        <h3 class="m-0 font-weight-bold text-dark mb-3">Top 5 Perusahaan</h3>

                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($top_kerja as $i => $tk) { ?>
                                    <tr>

                                        <th scope="row"><?= ++$i; ?></th>
                                        <td><?= $tk['nama_perusahaan']; ?></td>
                                        <td><?= $tk['id_kerja']; ?></td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>






    // persen kuliah
    // jumlah kuliah
    <?php
    $kuliah = mysqli_query($conn, "SELECT nama_univ FROM `kuliah` WHERE nama_univ IS NOT NULL");
    $jumlah_kuliah1 = $kuliah->num_rows;

    $semua_kuliah = mysqli_query($conn, "SELECT * FROM `kuliah`");
    $jumlah_kuliah2 = $semua_kuliah->num_rows;

    // persentase kuliah
    $persen_kuliah = $jumlah_kuliah1 / $jumlah_kuliah2 * 100;

    echo "persen kuliah : " . round($persen_kuliah, 2) . "%<br><br>";



    // top 5 kuliah
    $top_kuliah = mysqli_query($conn, "SELECT COUNT(id_kuliah) as id_kuliah, nama_univ FROM kuliah WHERE nama_univ IS NOT NULL GROUP BY nama_univ ORDER BY COUNT(id_kuliah) DESC LIMIT 5;");
    ?>
    <div class="container-fluid">
        <div class="row d-flex justify-content-center flex-column align-items-center">
            <div class="col-lg-10 ">
                <div class="card-shadow mb-4">
                    <!-- <div class="card-header py-2"> -->


                    <!-- </div> -->
                    <div class="card-body text-center">
                        <h3 class="m-0 font-weight-bold text-dark mb-3">Top 5 Kuliah</h3>

                        <table class="table ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($top_kuliah as $i => $tk2) { ?>
                                    <tr>

                                        <th scope="row"><?= ++$i; ?></th>
                                        <td><?= $tk2['nama_univ']; ?></td>
                                        <td><?= $tk2['id_kuliah']; ?></td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>






    // persen nganggur

    // persentase nganggur
    $persen_nganggur = 100 - ($persen_kerja + $persen_kuliah);

    echo "persen nganggur : " . round($persen_nganggur, 2) . "%";


    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>