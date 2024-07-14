<?php
include('../layouts/header.php')
?>

<link rel="stylesheet" href="../assets/css/style.css">

<title>Form Input Berita</title>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (file_exists('../db/berita.json')) {
        $final_data = Tambah_Data();
        file_put_contents('../db/berita.json', $final_data);
        header("Location: inputdata.php?status=success");
    } else {
        $final_data = Buat_Json();
        file_put_contents('../db/berita.json', $final_data);
        header("Location: inputdata.php?status=success");
    }

    // This right here responsible to alert the message according to the status.
}

function Tambah_Data()
{
    $id          = $_POST['id_berita'];

    $fileName    = $_FILES['image']['name'];
    $tempName    = $_FILES['image']['tmp_name'];
    $output      = '../images/' . $fileName;   //Image upload to folder photo

    move_uploaded_file($tempName, $output);

    $judul       = $_POST['fjudulBerita'];
    $isi         = $_POST['fisiBerita'];
    $kategori    = $_POST['fKategori'];
    $tgl    = $_POST['ftglBerita'];

    $current_data    = file_get_contents('../db/berita.json');
    //json_decode : Mengubah format JSON menjadi Array
    $array_data        = json_decode($current_data, true);

    $barang = array(
        'id'           =>    $id,
        'Image'        =>    $output,
        'Judul'        =>    $judul,
        'Isi'          =>    $isi,
        'Kategori'     =>    $kategori,
        'Tanggal'     =>    $tgl,
    );

    $array_data[]    = $barang;
    //json_encode : Mengubah format Array menjadi JSON
    $final_data     = json_encode($array_data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);


    return $final_data;
}

function Buat_Json()
{
    $id           = $_POST['id_berita'];

    $fileName     = $_FILES['image']['name'];
    $tempName     = $_FILES['image']['tmp_name'];
    $output       = '../images/' . $fileName;   //folder upload

    $judul        = $_POST['fjudulBerita'];
    $isi          = $_POST['fisiBerita'];
    $kategori     = $_POST['fKategori'];
    $tgl     = $_POST['ftglBerita'];


    move_uploaded_file($tempName, $output);
    $file        = fopen("../db/berita.json", "w");
    $array_data  = array();
    $barang      = array(
        'id'        =>    $id,
        'Image'     =>    $output,
        'Judul'     =>    $judul,
        'Isi'       =>    $isi,
        'Kategori'  =>    $kategori,
        'Tanggal'  =>     $tgl,
    );
    $array_data[] = $barang;
    $final_data = json_encode($array_data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    fclose($file);
    return $final_data;
}

if (file_exists('../db/berita.json')) {
    $current_data    = file_get_contents('../db/berita.json');
    $array_data        = json_decode($current_data, true);
    foreach ($array_data as $kode_ku) {
        $KODE[] = $kode_ku['id'];
    }
    $a = substr(max($KODE), 4, 2);
    $b = $a + 1;
} else {
    $b = 1;
}

?>

<div class="bg-content">
    <div class="container ">
        <div class="row">
            <div class="col-md-4">
                <h3>Form</h3>
                <div class="card">
                    <h5 class="card-header">Input Data Berita | ID : <?php
                                                                        if ($b < 10) {
                                                                            echo "kbe-0" . $b . "-" . date('Y');
                                                                        } else {
                                                                            echo "kbe-" . $b . "-" . date('Y');
                                                                        }
                                                                        ?></h5>
                    <div class="card-body">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" id="theForm" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="id_berita" value="<?php
                                                                            if ($b < 10) {
                                                                                echo "kbe-0" . $b . "-" . date('Y');
                                                                            } else {
                                                                                echo "kbe-" . $b . "-" . date('Y');
                                                                            }
                                                                            ?>" class="form-control" readonly>
                            <div class="form-group mb-2">
                                <label for="FileBerita">Gambar Berita</label>
                                <input class="form-control" name="image" type="file" id="workaround" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="JudulBerita">Judul Berita</label>
                                <input type="text" name="fjudulBerita" class="form-control" id="fjudulBerita" placeholder="Masukan Judul Berita" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="Deskripsi">Isi Berita</label>
                                <textarea type="text" name="fisiBerita" cols="30" rows="10" class="form-control" id="Deskripsi" placeholder="Masukan Deskripsi Berita" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="kategoriBerita">Kategori Berita</label>
                                <select class="form-control input-md" name="fKategori">
                                    <option value="Travel">Travel</option>
                                    <option value="Kesehatan">Kesehatan</option>
                                    <option value="Politik">Politik</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label for="tglBerita">Tanggal Berita</label>
                                <input id="date" data-provide="datepicker" name="ftglBerita" class="datepicker form-control" id="tglBerita" required>

                            </div>
                            <div class="mt-3 d-flex justify-content-end">
                                <button class="btn btn-primary" onclick="val()" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mt-5">
                    <h5 class="card-header">Data Berita <?php ?></h5>
                    <div class="card-body">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered">
                                <tr class="table-info">
                                    <th style="text-align:center;" width="10%">ID</th>
                                    <th style="text-align:center;" width="5%">Gambar</th>
                                    <th style="text-align:center;" width="50%">Judul Berita</th>
                                    <th style="text-align:center;" width="20%">Isi Berita</th>
                                    <th style="text-align:center;" width="5%">Kategori</th>
                                    <th style="text-align:center;" width="5%">Dibuat</th>
                                    <th style="text-align:center;" width="5%">Aksi</th>
                                </tr>
                                total berita :
                                <?php
                                if (file_exists('../db/berita.json')) {
                                    $current_data   = file_get_contents('../db/berita.json');
                                    $array_data     = json_decode($current_data, true);
                                    $totalberita     = count($array_data);
                                    arsort($array_data);
                                    if ($totalberita > 0) {
                                        echo $totalberita . " item";
                                        $index = 0;
                                    } else {
                                        echo "Kosong";
                                    }
                                    foreach ($array_data as $listberita) {
                                ?>
                                        <tr>
                                            <td class="text-center"> <?php echo $listberita['id']; ?> </td>
                                            <td class="text-center"> <img src="<?php echo $listberita['Image']; ?>" width="50" height="50"> </td>
                                            <td> <?php echo substr($listberita['Judul'], 0, 60); ?> </td>
                                            <td> <?php echo substr($listberita['Isi'], 0, 60); ?>... </td>
                                            <td class="text-center"> <?php echo $listberita['Kategori']; ?> </td>
                                            <td class="text-center"> <?php
                                                                        $oldDate = $listberita['Tanggal'];
                                                                        $newDate = date("d-m-Y", strtotime($oldDate));
                                                                        echo $newDate;
                                                                        ?> </td>
                                            <td class="text-center"><a class="text-decoration-none text-danger" href="deletedata.php?id=<?php echo $index; ?>">delete</a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('../layouts/footer.php')
?>