<footer>
<div class="clearfix"></div>
            <div class="container-fluid">
                <p class="copyright">&copy; 2019 Unknown All Rights Reserved.</p>
            </div>
        </footer>
    <!-- END WRAPPER -->
    <!-- Javascript -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/chartist/js/chartist.min.js"></script>
    <script src="DataTables-1.10.16/media/js/jquery.js"></script>
    <script src="DataTables-1.10.16/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/sweetalert2.min.js"></script>
    <script src="assets/js/funciones.js"></script>
    <script src="js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "language": {
                "lengthMenu": "Mostrar: _MENU_ Registros",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay Registros disponibles",
                "infoFiltered": "(filtrada de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "processing": "Buscando...",
                "search": "Buscar",
                "zeroRecords": "No hay registros que coincidan",
                "paginate": {
                    "next": "siguiente",
                    "previous": "anterior"
                },
            },
            "ordering": false,

        });
    });

</script>
<script>
    $(document).ready(function() {
      $('.select2').select2();
    });
  </script>

</body>

</html>
