<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wildmeat App</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="col-lg-4">
        <h2>Taxon</h2>
        {{ Form::open() }}
          <div class="form-group">
            <label for="">Kingdom</label>
            <input list="kingdom" placeholder="Select Kingdom">
            <datalist id="kingdom">
            <option value="">test me</option>
                @foreach ($kingdom as $key => $value)
                  <option value="{{$value->id}}">{{ $value->kingdom_name }}</option>
                @endforeach
            </datalist>
          </div>

          <div class="form-group">
            <label for="">Phylum</label>
            <select class="form-control" name="regencies" id="regencies">
              <option value="0" disable="true" selected="true">Select Phylum</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Class</label>
            
            <select class="form-control" name="districts" id="districts">
              <option value="0" disable="true" selected="true">Select Class</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Order</label>
            <select class="form-control" name="villages" id="villages">
              <option value="0" disable="true" selected="true">Select Order</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Familia</label>
            <select class="form-control" name="villages" id="villages">
              <option value="0" disable="true" selected="true">=== Select Familia ===</option>
            </select>
            </div>

            <div class="form-group">
            <label for="">Genus</label>
            <select class="form-control" name="villages" id="villages">
              <option value="0" disable="true" selected="true">=== Select Genus ===</option>
            </select>
          </div>


          <div class="form-group">
            <label for="">Species</label>
            <select class="form-control" name="villages" id="villages">
              <option value="0" disable="true" selected="true">=== Select Species ===</option>
            </select>
          </div>



        {{ Form::close() }}
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script type="text/javascript">
      $('#provinces').on('change', function(e){
        console.log(e);
        var province_id = e.target.value;
        $.get('/json-regencies?province_id=' + province_id,function(data) {
          console.log(data);
          $('#regencies').empty();
          $('#regencies').append('<option value="0" disable="true" selected="true">=== Select Regencies ===</option>');

          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

          $.each(data, function(index, regenciesObj){
            $('#regencies').append('<option value="'+ regenciesObj.id +'">'+ regenciesObj.name +'</option>');
          })
        });
      });

      $('#regencies').on('change', function(e){
        console.log(e);
        var regencies_id = e.target.value;
        $.get('/json-districts?regencies_id=' + regencies_id,function(data) {
          console.log(data);
          $('#districts').empty();
          $('#districts').append('<option value="0" disable="true" selected="true">=== Select Districts ===</option>');

          $.each(data, function(index, districtsObj){
            $('#districts').append('<option value="'+ districtsObj.id +'">'+ districtsObj.name +'</option>');
          })
        });
      });

      $('#districts').on('change', function(e){
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id,function(data) {
          console.log(data);
          $('#villages').empty();
          $('#villages').append('<option value="0" disable="true" selected="true">=== Select Villages ===</option>');

          $.each(data, function(index, villagesObj){
            $('#villages').append('<option value="'+ villagesObj.id +'">'+ villagesObj.name +'</option>');
          })
        });
      });


    </script>

  </body>
</html>