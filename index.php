    <?php
    include('layouts/header.php');
    ?>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Home Berita</title>

    <!-- content -->
    <div class="bg-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mb-4">
                    <h3>News</h3>
                    <?php
                    if (file_exists('db/berita.json')) {
                        $current_data     = file_get_contents('db/berita.json');
                        $array_data     = json_decode($current_data, true);
                        rsort($array_data);
                        foreach ($array_data as $listberita) {
                    ?>
                            <div class="card mb-4" style="max-width: 900px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="images/<?php echo $listberita['Image']; ?>" alt="img" style="width: 300px; height: 198px; object-fit: cover; object-position: 100% 1;" class="figure-img img-fluid" alt="img" height="200">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="text-uppercase fw-bold"><a href="detail.php?id=<?php echo $listberita['id']; ?>"> <?php echo substr($listberita['Judul'], 0, 60); ?> </a></h5>
                                            <p class="card-text"><?php echo substr($listberita['Isi'], 0, 160); ?>...
                                                <a href="detail.php?id=<?php echo $listberita['id']; ?>" class="text-decoration-none">Lebih lengkap</a>
                                            </p>
                                            <p class="card-text">
                                                <small class="text-body-secondary">
                                                    <?php
                                                    $oldDate = $listberita['Tanggal'];
                                                    $newDate = date("d F Y", strtotime($oldDate));
                                                    echo $newDate;
                                                    ?>
                                                </small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
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