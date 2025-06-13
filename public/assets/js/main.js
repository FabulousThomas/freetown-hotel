$(document).ready(function () {
   // FILTER TABLE SEARCH
   $("#myInput").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $("#myTable tbody tr").filter(function () {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
   });

   $('.toast').toast('show');

   // SHOW BOOKING DETAILS
   $('.booking_details').on('click', function () {
      $('#booking_details').modal('show');

      $tr = $(this).closest("tr");
      var data = $tr.children("td").map(function () {
         return $(this).text();
      }).get();

      $('#bk_id').val(data[0]);
      $('#rm_id').val(data[1]);
      $('#cost').val(data[2]);
      $('#status').val(data[3]);
      $('#date').val(data[4]);
      $('#name').val(data[5]);
      $('#price').val(data[6]);
      $('#days').val(data[7]);
   });

   // SHOW BOOKING RECEIPT
   $('.booking_receipt').on('click', function () {
      $('#booking_receipt').modal('show');

      $tr = $(this).closest("tr");
      var data = $tr.children("td").map(function () {
         return $(this).text();
      }).get();

      $('#book_id').val(data[0]);
      $('#room_id').val(data[1]);
      $('#r_cost').val(data[2]);
      $('#sub_total').val(data[2]);
      $('#status').val(data[3]);
      $('#date').val(data[4]);
      $('#u_name').val(data[5]);
      $('#r_name').val(data[5]);
      $('#price').val(data[6]);
      $('#days').val(data[7]);
   });
});