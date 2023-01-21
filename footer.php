<div class="alert-box success"></div>
<div class="alert-box failure"></div>
<div class="alert-box warning"></div>
<!-- <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer> -->
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<div id="print-page">
  <div class="print-head">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <img src="img/switch2.png" id="print-img">
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12 col-sm-12">
        <p class="less text-center">PHONES|LAPTOPS|GADGETS|ACCESSORIES</p>
        <p class="text-center">2,OSHITELU STREET COMPUTER VILLAGE, IKEJA</p>
        <p class="text-center"><i class="fas fa-phone"></i>07053112479, 07044842350, 08063127611</p>
        <p class="text-center"><i class="fab fa-instagram"></i> Switch_Phones_Gadgets</p>
      </div>
    </div>
  </div>
  <hr>
  <div class="print-body">
    <p>Customer Name: <span id="customer-name"></span></p>
    <p>Customer Address: <span id="customer-address"></span></p>
    <p>Customer Phone: <span id="customer-phone"></span></p>
    <p>Payment Mode: <span id="payment-type"></span></p>
    <hr>
    <p><span class="date less float-left"></span> <span class="invoiceID less float-right"></span></p>
    <p>.</p>
    <div id="product-list">

    </div>
    <hr>
    <p class="float-right">TOTAL <span class="prnt-total"></span></p>
    <p class="words"></p>
    <!-- <hr> -->
    <p>.</p>

    <p><span class="float-left">------------------</span> <span class="float-right">------------------</span></p>
    <p><span class="customer-sign less float-left">Customer Signature</span> <span class="ceo-sign less float-right">CEO Sign and Stamp</span></p>
  </div>

</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <a class="btn btn-primary" href="logout.php">Logout</a>
  </div>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/main.js"></script>
<script src="js/notification.js" charset="utf-8"></script>

<!-- Dashboard page scripts -->
<?php if ($title == "Dashboard"): ?>
  <script src="js/dashboard.js" charset="utf-8"></script>
  <script src="ajax/dashboard.js" charset="utf-8"></script>
<?php endif; ?>

<!-- Products page scripts -->
<?php if ($title == "Products"): ?>
  <link rel="stylesheet" href="css/datatables.min.css">
  <script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
  <script src="ajax/products.js"></script>
  <script src="js/products.js" charset="utf-8"></script>
<?php endif; ?>

<!-- Create product page scripts -->
<?php if ($title == "Invoice"): ?>

  <script src="js/invoice.js"></script>
  <script src="ajax/invoice.js" charset="utf-8"></script>
<?php endif; ?>

<?php if ($title == "Record"): ?>
  <script type="text/javascript" src="js/record.js"></script>
  <script type="text/javascript" src="ajax/record.js"></script>
<?php endif ?>

<!-- Page level plugins -->
<!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script> -->

</body>

</html>
