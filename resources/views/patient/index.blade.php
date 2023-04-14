@extends('navbar')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <div style="margin-right:50px;margin-left:50px;">
    <p class="h3">Add a new Patient</p>
    <div class ="ext">
        @if(session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }}</div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success"> {{ session()->get('success') }}</div>
   
    @endif
     </div>
    <form action='patient/patient_store' method ='post'>
        <input type="hidden" name="ext" value="1">
        @csrf
        <input type="hidden" name="table" value="Patient">

            <div class="form-row">
                <div class="col">
                    <label for="inputEmail4">Patient First Name</label>
                <input type="text" name="r_fld[first_name]" class="form-control" placeholder="Patient First name">
                </div>
                <div class="col">
                    <label for="inputEmail4">Patient Last Name</label>
                <input type="text" name="r_fld[last_name]" class="form-control" placeholder="Patient Last name">
                </div>
            </div>

            <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Date Of Birth</label>
                <input type="date" name="r_fld[dob]"class="form-control" id="inputEmail4" placeholder="Date of Birth">
            </div>
            {{-- <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div> --}}
            </div>
            <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" name="r_fld[address]"class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            {{-- <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" name="r_fld[last_name]"class="form-control" id="inputAddress2" placeholder="">
            </div> --}}
            <div class="form-row">
                <div class="col">
                    <label for="inputEmail4">Next of Kin</label>
                <input type="text" name="r_fld[next_of_kin]"class="form-control" placeholder="Next of Kin name">
                </div>
                <div class="col">
                    <label for="inputEmail4">Phone Number</label>
                <input type="number" name="r_fld[contact]"class="form-control" placeholder="+25670000000">
                </div>
            </div>
            <br/>
            <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
   </div>
</body>
</html>
@endsection