
		<header>
      <div class="logo-box">
        <!-- <img src="https://khakimbeauty.com/wp-content/uploads/2019/03/logo.png" class="logo" alt="logo"> -->
        <h1>UPLOAD LINK</h1>
      </div>

     
    </header>
     
     <form action="{{ route('importID') }}" method="POST" enctype="multipart/form-data">@csrf
        <input type="file" name="file" class="form-control"><br>
        <button class="btn btn-success">Submit</button>
        <a class="btn btn-warning" href="{{ route('DeleteAPI') }}">Delete All</a>
        <a class="btn btn-warning" href="{{ route('DeletePre') }}">Delete Predict</a>
        
      </form>
       <form action="{{ route('CallAPI') }}" method="POST" enctype="multipart/form-data">@csrf
        <button class="btn btn-success">Update</button>   
      </form>

       
      
                                

