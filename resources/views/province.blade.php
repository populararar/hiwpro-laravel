<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<title>Address</title>
  </head>
  
  <style>
.box{
    width: 600px;
    text-align: center;
    margin: auto;
}
h1 {
    text-align: center;
}

.tabs {
    list-style: none;
    margin: 0;
    padding: 0;
}

.tabs li {
    display: inline-block;
    padding: 15px 25px;
    background: none;
    text-transform: uppercase;
    cursor: pointer;
}


.tabs li.current {
    background: #fff;
    border: 1px solid #2311;
    border-bottom: 1px solid #cf2132;
}
.tab-contents {
    background: #fff;
    padding: 20px;
    border-top: 1px solid #ddd;
}

.tab-pane {
    display: none;
}

.tab-pane.current {
    display: block;
}
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 0;
    background-color: transparent;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: 0%;
    border-top: 1px solid #dee2e6;
}


</style>
    
  <body>
<div class="container box">


    
    <div class="form-group">
        {{ csrf_field() }}
        <label for="inputState">ข้อมูลจังหวัดในประเทศไทย</label>
        <select id="provinces" name="provinces"  class="form-control provinces" >
          <option value="">เลือกข้อมูลจังหวัดของท่าน</option>
          @foreach ($list as $row)
            <option value="{{ $row->id}}">{{ $row->name_th}}</option>
          @endforeach
         
        </select>
    </div>
    <div class="form-group">
        <label for="inputState">ข้อมูลจังหวัดในประเทศไทย</label>
        <select id="amphures" name="amphures" class="form-control amphures">
            <option value="">เลือกข้อมูลอำเภอของท่าน</option>
          
            
        </select>
   
</div>
{{-- wrapper --}}
    
    {{-- ******************************* --}}
 
</div> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->


  <script type="text/javascript">

    $('.provinces').change(function(){
        if($(this).val()!=''){
            var select=$(this).val();
            var _token=$('input[name="_token"]').val();
          
            $.ajax({
                url:"{{route('dropdown.fetch')}}",
                method:"POST",
                data:{select:select,_token:_token},
                success: function(result){
                    $('.amphures').html(result);
                }
            });
         
        }
        
    });
    

$(function() {
    $('.tabs li').on('click', function() {
        var tabId = $(this).attr('data-tab');

        $('.tabs li').removeClass('current');
        $('.tab-pane').removeClass('current'); 

        $(this).addClass('current');
        $('#' + tabId).addClass('current');
    });
});
 

  
</script>  
  

</body>
</html>