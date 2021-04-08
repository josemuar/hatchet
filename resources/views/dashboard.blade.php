<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- BEGIN -->
    <div class="container">

    <div class="card" style="margin-top: 50px" >
      <div class="card-header">
        Search
      </div>
      <div class="card-body">
        <div class="row">
            
            <!-- 1st column -->
            <div class="col-sm">
              <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" id="address" name="address" aria-describedby="office address" placeholder="Enter office address">
              </div>
            </div>

            <!-- 2nd column -->
            <div class="col-sm">
                <jlmaselect2 _id='offices' _name='offices' _title='# Office' _fgroup_class="" _multiple=0  _required=0 _value='' :_items="{{ $offices }}"></jlmaselect2> 
            </div>

            <!-- 3rd column -->
            <div class="col-sm">
                <jlmaselect2 _id='tables' _name='tables' _title='# Tables' _fgroup_class="" _multiple=0  _required=0 _value='' :_items="{{ $tables }}"></jlmaselect2> 
            </div>

            <!-- 4th column -->
            <div class="col-sm">
                <jlmaselect2 _id='sqms' _name='sqms' _title='Square Metres' _fgroup_class="" _multiple=1  _required=0 _value='' :_items="{{ $sqms }}"></jlmaselect2> 
            </div>

            <!-- 5th column -->
            <div class="col-sm">
                <jlmaselect2 _id='prices' _name='prices' _title='Price range' _fgroup_class="" _multiple=1  _required=0 _value='' :_items="{{ $prices }}"></jlmaselect2> 
            </div>


            
        </div>
      </div>
      <div class="card-footer">
        <jlmabutton _id='submit' _name='submit' _spinner=0 _title='Search' _button_class="btn  btn-primary m-1" > </jlmabutton>
      </div>
    </div>
    
    <jtable
        _id='deafult_ordering_table'  
        _name='deafult_ordering_table'  
        _title='Offices List' 
        _table_class='table display nowrap'
        :_address="address"
        :_number_offices="number_offices"
        :_number_tables="number_tables"
        :_sqms="sqms"
        :_prices="prices"
    >
    </jtable>            

        


    </div>

    <!-- END -->

    

    @section('page-js')
    <script type="text/javascript">
        let vm = null;   
            
            $(document).ready(function(){

                bus.$on("button_clicked", function(id, name){
                    vm.address = $("#address").val();
                    vm.number_offices = $("#offices").val();
                    vm.number_tables = $("#tables").val();
                    vm.sqms = $("#sqms").select2().val();
                    vm.prices = $("#prices").select2().val();
                    
                    var bounced = _.debounce(function(){
                      bus.$emit("table_body_load");
                    }, 300);

                    bounced();

                });
                
                vm = new Vue({
                    el : "#app",
                    name : 'my_root',
                    data() {
                      return {
                        address: "",
                        number_offices: null,
                        number_tables: null,
                        sqms: null,
                        prices: null,
                      }
                    },
                    components: {
                        
                    },
                    created(){  
                    },
                    mounted(){
                        console.log("mounted root...");
                    },
                    methods: 
                    {   
                    }
                }); 
            });

        </script>
    @stop

</x-app-layout>



