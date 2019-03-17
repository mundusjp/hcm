<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('lib/jquery-typeahead/dist/jquery.typeahead.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/popper.js/js/popper.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/jquery-toggles/js/toggles.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/slim.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://cdn.jsdelivr.net/momentjs/latest/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('lib/PapaParse/papaparse.min.js')}}"></script>
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
