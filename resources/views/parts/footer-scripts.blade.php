<script type="text/javascript" src="{{ asset('lib/jquery/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/popper.js/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slim.js') }}"></script>
<script type="text/javascript" src="{{ url('https://cdn.jsdelivr.net/momentjs/latest/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ url('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/PapaParse/papaparse.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('lib/select2/js/select2.full.min.js') }}"></script>

<script>
$('.ubahmanajer').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#ubahmanajer').attr('href','delete-cover.php?id='+id);
})
</script>
<script>
    $(document).ready(function(){
        var $progressbar = $("#progressbar");
        $progressbar.show();
        var updateProgressBar = function(evt) {
            if(evt.lengthComputable) {
                var percent = (evt.loaded*100)/evt.total;
                $(function(){
                    $progressbar.css('width', percent.toFixed(1) + '%');
                });
            }
        }
        $('#submitform').on('submit', function(e){
            e.preventDefault();
            $('#progressbar').fadeIn();
            $.ajax({
                url: "Process-Orderplaced",
                type: "POST",
                data: new UpOrder(this),
                contentType: false,
                processData: false,
                success: function(data){
                    console.log(data);
                    $progressbar.css('width', '100%');
                },
                error: function(data){
                    alert("Something went wrong !");
                });
            });
        }).uploadProgress(updateProgressBar).upload(updateProgressBar);
    });
</script>
<script>
$('.ubahvisi').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#modallCancel').attr('href','perusahaan.destroy?id='+id);
});

$('.ubahmisi').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#modallCancel').attr('href','perusahaan.destroy?id='+id);
});
</script>
<!-- <script>
$(document).ready(function(){
  $('#media_source').keyup(function(){
    var query = $(this).val();
    if(query != ''){
      var _token = $('input[name="_token"]').val();
      $.ajax({
        url:"{{url('autocomplete')}}",
        method:"POST",
        data:{query:query, _token:_token},
        success:function(data){
          $('#medialist').fadeIn();
          $('#medialist').html(data);
        }
      });
    }
  });
  $(document).on('click', 'li', function(){
    $('#media_source').val($(this).text());
    $('#medialist').fadeOut();
  });
});
</script> -->
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'center',
    dateFormat: 'yyyy-mm-dd'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>

<script>
$("#submit").click(function(e){
     e.preventDefault();
     $('#img').show();
     $(this).closest('submitform').submit();
});
</script>
