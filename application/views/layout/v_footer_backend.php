 </div>
 <!-- /.row -->
 </div><!-- /.container-fluid -->
 </div>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Main Footer -->
 <footer class="main-footer">
 	<!-- To the right -->
 	<div class="float-right d-none d-sm-inline">
 		Sari Telang Online Shop
 	</div>
 	<!-- Default to the left -->
 	<strong>Copyright &copy; 2022 <a href="#"> Sari Telang </a>.</strong> All rights reserved.
 </footer>
 </div>
 <!-- ./wrapper -->

 <!-- REQUIRED SCRIPTS -->

 <!-- jQuery -->
 <script>
 	$(function() {
 		$("#example1").DataTable({
 			"responsive": true,
 			"autoWidth": false,
 		});
 		$('#example2').DataTable({
 			"paging": true,
 			"lengthChange": false,
 			"searching": false,
 			"ordering": true,
 			"info": true,
 			"autoWidth": false,
 			"responsive": true,
 		});
 	});
 </script>
 <script>
 	window.setTimeout(function() {
 		$(".alert").fadeTo(500, 0).slideUp(500, function() {
 			$(this).remove();
 		});
 	}, 3000)
 </script>
 </body>

 </html>