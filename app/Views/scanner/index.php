                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Master Scanner</h1> -->
                    <!-- <a class="edit" href="/user/add"><button type="button" class="btn btn-primary">Tambah</button></a> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Scanner</h6>
                        </div>
                        <?php if (session('success')) : ?>
                            <div id="alert" class="alert alert-success">
                                <?php echo session('success'); ?> 
                                <br>
                                Notifikasi akan di tutup dalam  
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> 

                        <?php elseif (session('error')) : ?>
                            <div id="alert" class="alert alert-danger">
                                <?php echo session('error'); ?> 
                                <br>
                                Notifikasi akan di tutup dalam  
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div> 
                        <?php endif ?>

                        <center>
                            <div class="col-md-6" id="reader"></div>
                        </center>

                        <div class="card-body">
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

<script type="text/javascript">
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        window.location.href = "/absen/absen_pegawai/"+decodedText;
        // alert("hai" + decodedText);
        // setTimeout(function() { alert("Your Code :  " + decodedText); }, 3000);
        // console.log(`Code matched = ${decodedText}`, decodedResult);
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 30, qrbox: {width: 300, height: 300} },
        /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>


<script type="text/javascript">
    setTimeout(function () {
        // Closing the alert
        $('#alert').alert('close');
    }, 5000);

    // Mencari elemen alert berdasarkan ID
    var alertElement = document.getElementById("alert");

    // Mencari tombol close di dalam elemen alert
    var closeButton = alertElement.querySelector(".close");

    // Mencari elemen countdown di dalam elemen alert
    var countdownElement = document.createElement("span");
    countdownElement.innerText = "5"; // Angka awal countdown
    alertElement.appendChild(countdownElement);

    // Menambahkan event listener ke tombol close
    closeButton.addEventListener("click", function() {
        // Menghilangkan elemen alert saat tombol close diklik
        alertElement.style.display = "none";
    });

    // Mengatur countdown
    var countdown = 5;
    var countdownInterval = setInterval(function() {
        countdown--;
        countdownElement.innerText = countdown; // Mengupdate angka countdown

        if (countdown === 0) {
            clearInterval(countdownInterval);
            alertElement.style.display = "none"; // Menyembunyikan alert setelah countdown selesai
        }
    }, 1000); // Interval 1 detik (1000 ms)


</script>