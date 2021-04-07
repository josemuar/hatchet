<div class="container">

<div class="p-0 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>
    
</div>



<div class="slidecontainer">
  <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
</div>


{{ $price_min }}

<div class="card" style="margin-top: 50px" >
  <div class="card-header">
    Search
  </div>
  <div class="card-body">
    <div class="row">
        <div class="col-sm">
          <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="office address" placeholder="Enter office address">
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
          <label for="price">Price</label>
          <select id='price_min' name='price_min' class="form-control">
                <option value="{$price_min}"> {{$price_min}} </option>
          </select>

          <select id='price_max' name='price_max' class="form-control">
                <option value="{$price_max}"> {{$price_max}} </option>
          </select>
          </div>
        </div>
        
        <div class="col-sm">
          <div class="form-group">
          <label for="price">Price</label>
          <select id='price_min' name='price_min' class="form-control">
                <option value="{$price_min}"> {{$price_min}} </option>
          </select>

          <select id='price_max' name='price_max' class="form-control">
                <option value="{$price_max}"> {{$price_max}} </option>
          </select>
          </div>
        </div>

        <div class="col-sm">
          <div class="form-group">
          <label for="price"># Offices</label>
          <select id='price' name='price' class="form-control">
            @foreach ($offices as $key => $office)              
                <option value="{{ $office->offices }}"  > {{$office->offices}} </option>
            @endforeach
          </select>
          </div>
        </div>

    </div>
  </div>
  <div class="card-footer">
    <jlmabutton _id='submit' _name='submit' _spinner=0 _title='Submit' _button_class="btn  btn-primary m-1"> </jlmabutton>
  </div>
</div>

<div class="alert alert-primary" role="alert" style="margin-top: 50px">
  OFFICES LIST
</div>



<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Offices</th>
      <th scope="col">Tables</th>
      <th scope="col">Sqm</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>



</div>


<script type="text/javascript">

    $(document).ready(function() {    
    
    });

</script>
        
