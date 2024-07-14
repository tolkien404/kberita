<footer class="site-footer">
    <div class="foot2 py-2">
        <div class=" container">
            <div class="row text-center">
                <div class="col-12">
                    <p><small class="text-white">
                            Copyright &copy; Kabita Berita</small>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

<script type="text/javascript">

    $(document).ready(function() {
        setTimeout(function() {
            <?php
            if ($_GET['status'] == 'success') {
                echo 'alert("Berhasil di tambah");';
            } else {
                echo 'alert("Gagal di tambah");';
            }
            ?>
        }, 500);
    });
</script>

<script type="text/javascript">
    var date = new Date();
    date.setDate(date.getDate());

    $('.datepicker').datepicker({
        startDate: date,
        autoclose: true,
        format: "dd-mm-yyyy",
        immediateUpdates: true,
        todayBtn: true,
        todayHighlight: true
    }).datepicker("setDate", "0");
</script>

</html>