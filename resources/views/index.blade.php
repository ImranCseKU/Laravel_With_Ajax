<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- DateTimePicker Jquery css -->
    <link rel="stylesheet" href="{{asset('build/jquery.datetimepicker.min.css')}}">
    <!-- DataTables CSS CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- DataTables Js CDN -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <!-- DateTimePicker jquery js -->
    <script src="{{asset('build/jquery.datetimepicker.full.min.js')}}"></script>


    



    <!-- Custom CSS For This Page-->
    <link rel="stylesheet" href="{{ asset('css/web.css')}}">
   

    <title>Patient Regintration From</title>
    
    </head>
    <body class="bd">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">

                    <h2 class="text-center font-weight-bold mb-4">Patient Registration Form</h2>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('patient.register')}}" method="post" autocomplete="off">
                        @csrf
                        <!-- <div class="form-row mb-3">
                            <div class="col">
                                <label for="" class="font-weight-bold" style="color:#FFA500">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Patient name">
                            </div>
                            <div class="col">
                                <label for="" class="font-weight-bold" style="color:#FFA500">DoB</label>
                                <input type="text" name="dob" class="form-control" id="datepicker" placeholder="Enter Date of Birth">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="" class="font-weight-bold" style="color:#FF5733">Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Enter Patient name">
                        </div>
                        <div class="form-group">
                            <label for="" class="font-weight-bold" style="color:#FF5733">DoB</label>
                            <input type="text" name="dob" value="{{old('dob')}}" class="form-control" id="datepicker" placeholder="Enter Date of Birth">
                        </div>

                        <!-- <div class="form-row mb-4">
                            <div class="col">
                                <label for="" class="font-weight-bold" style="color:#FFA500">Disease</label>
                                <input type="text" name="disease" class="form-control" placeholder="Enter Disease Name">
                            </div>
                            <div class="col">
                                <label for="" class="font-weight-bold" style="color:#FFA500">Cell</label>
                                <input type="text" name="cell" class="form-control" placeholder="Enter Phone Number">
                            </div>
                        </div> -->

                        <div class="form-group">
                            <label for="" class="font-weight-bold" style="color:#FF5733">Disease</label>
                            <input type="text" name="disease" value="{{old('disease')}}" class="form-control" placeholder="Enter Disease Name">
                        </div>

                        <div class="form-group">
                            <label for="" class="font-weight-bold" style="color:#FF5733">Phone</label>
                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Enter Phone Number">
                        </div>

                        <h2 class="text-center font-weight-bold mb-3">Location</h2>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="division" class="font-weight-bold" style="color:#FF5733">Select Division</label>
                                <select id="division" name="division" class="form-control">
                                    <option value="" selected>Choose...</option>
                                    @foreach($divisions as $division)
                                        <option value="{{$division->id}}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="district" class="font-weight-bold" style="color:#FF5733">Select District</label>
                                <select id="district" name="district" class="form-control" disabled>
                                    <option value="" selected>Choose...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="thana" class="font-weight-bold" style="color:#FF5733">Select Thana</label>
                                <select id="thana" name="thana" class="form-control" disabled>
                                    <option selected>Choose...</option>
                                </select>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-info text-dark font-weight-bold">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- datetimepicker js -->
    <script src="{{asset('build/jquery.datetimepicker.full.min.js')}}"></script>
    

    <script>
        $(document).ready(function(){

            $('#datepicker').datetimepicker({
                timepicker:false,
                datepicker:true,
                format:'Y-m-d',
                theme:'dark'
            });

            $('#division').change(function(){
                let division_id = $(this).children("option:selected").val();
                if( division_id != ""){
                    console.log(division_id);
                    $('#district').removeAttr("disabled");
                    $('#district').empty();
                    $('#district').append('<option value="" selected>Choose...</option>');
                    //ajax call ...

                    $.ajax({
                        url: 'district/'+division_id,
                        dataType: "json",
                        success: function(data){
                            for( let count=0 ; count < data.districts.length ; count++){

                                $('#district').append( '<option value="'+data.districts[count].id+'" >'+data.districts[count].name+'</option>' );
                            }

                            //Eloquent Model return an OBJECT( here TblDivision CLass Object)
                            //      We can get all districts by the districts() method of this OBJECT 
                            // for (district of data.all_districts.districts) {
                            //     $('#district').append( '<option value="'+district.id+'" >'+district.name+'</option>' );
                            // }
                            // console.log(data.all_districts.districts)
                        }
                    });

                }
            });


           /*-----thana-----*/
           $('#district').change(function(){
                let district_id = $(this).children("option:selected").val();
                if( district_id != ""){
                    console.log(district_id);
                    $('#thana').removeAttr("disabled");
                    $('#thana').empty();
                    $('#thana').append('<option value="" selected>Choose...</option>');
                    
                    //ajax call ... 
                    $.ajax({
                        url: 'thana/'+district_id,
                        dataType: "json",
                        success: function(data){

                            //Eloquent Model return an OBJECT( here TblDistrict CLass Object)
                            //      We can get all districts by the thanas() method of this OBJECT 
                            for (thana of data.all_thanas.thanas) {
                                $('#thana').append( '<option value="'+thana.id+'" >'+thana.name+'</option>' );
                            }
                        }
                    });
                }
            });



        });
    </script>   
    </body>
</html>