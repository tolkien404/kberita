<?php
include('layouts/header.php');
?>
<link rel="stylesheet" href="assets/css/style.css">

<div class="bg-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-4">
                <?php
                $kdBerita     = $_GET['id'];
                $data           =  file_get_contents('db/berita.json');
                $array_data     = json_decode($data, true);
                foreach ($array_data as $detailberita) {
                    if ($kdBerita == $detailberita['id']) {
                ?>
                        <title><?php echo $detailberita['Judul']; ?></title>

                        <div class="card">
                            <h4 class="fw-bold text-center text-capitalize fs-3"><?php echo $detailberita['Judul']; ?></h4>
                            <p class="text-center fs-6 fw-light"><?php echo $detailberita['Kategori']; ?> |
                                <?php echo round((((time() - strtotime($detailberita['Tanggal'])) / 60) / 60) / 24) . ' hari lalu'; ?></p>
                            <img src="images/<?php echo $detailberita['Image']; ?>" alt="img" class="figure-img img-fluid" style="width: 100%; height: 450px; object-fit: cover; object-position: 100% 1;">
                            <?php echo $detailberita['Isi']; ?></p>

                        </div>
                <?php
                    }
                    else "data tidak ada";
                }
                ?>
            </div>
            <div class="col-md-4">
                <h3>Kategori</h3>
                <div class="card">
                    <div class="card-body">
                        <?php
                        $kategori_data     = file_get_contents('db/berita.json');
                        $arraykat_data     = json_decode($kategori_data, true);
                        $temp = array();
                        foreach ($arraykat_data as $key => $item) {
                            if (!in_array($item['Kategori'], $temp)) {
                                echo $item['Kategori'] . " | ";
                                $temp[] = $item['Kategori'];
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
include('layouts/footer.php');
?>