<?php if ($level == "" || $level == "Customer") : ?>
    <div class="puter container flex-c-sm border mt-4 p-3 b-r-navbar shadow">
        <footer class="align-items-center ml-4">
            <div class="content">
                <div class="row mx-auto">
                    <div class="col-lg-7">
                        <span class="text-body-secondary mb-3 font-weight-bold">TakeIt! Dessert Cafe</span><br>
                        <span class="text-body-secondary">Started with the simple vision of building a space to share beautiful and delicious desserts.We want our visitors to come and experience unique flavors from around the world, in a setting that is not only welcoming but one you would want to revisit time and time again.</span>
                    </div>
                    <div class="col ml-sm-5">
                        <div class="text-footer-head font-weight-bold">
                            <span class="text-body-secondary mb-3">Contact Us:</span>
                        </div>
                        <div class="text-footer ml-2">
                            <span>+62 1234 5678 90</span><br>
                            <span>TakeIt!DessertCafe@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
<?php endif; ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="/auth/vendor/bootstrap/js/popper.js"></script>
<script src="/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Datatables -->
<script type="text/javascript" src="../dashboard/assets/js/script.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

<!-- Aos -->
<script type="text/javascript" src="assets/aos/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="/auth/vendor/select2/select2.min.js"></script>

<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('txt1').value;
        var txtSecondNumberValue = document.getElementById('txt2').value;
        var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue));
        if (!isNaN(result)) {
            document.getElementById('txt3').value = result;
        }
    }

    function sumBeli() {
        var txtFirstNumberValue = document.getElementById('jumlah').value;
        var txtSecondNumberValue = document.getElementById('harga').value;
        var result = (parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue));
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#tabel').DataTable();
    });

    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    // AOS.init();
    $(document).ready(function() {

        $('.diskon').on('keyup', function() {
            let hartot = $('.hartot').val();
            let diskon = $('.diskon').val();
            let diskonAkhir = hartot * diskon / 100;
            let anjay = hartot - diskonAkhir;
            $('.totbayar').val(anjay);
        })
        $('.uang').on('keyup', function() {
            let totbar = $('.totbayar').val();
            let uang = $('.uang').val();
            let kembalian = uang - totbar;
            $('.kembalian').val(kembalian);
            if (uang == 0) {
                $('.kembalian').val('');
            }
        })
    })

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })
</script>
<script>
</script>
</body>

</html>