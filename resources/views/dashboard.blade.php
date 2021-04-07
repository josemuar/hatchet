<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                

                
                <jtable 
                _id='deafult_ordering_table'  
                _name='deafult_ordering_table'  
                _title='Offices List' 
                _table_class='table display nowrap'
                _prices="{{ $prices }}"
                
                ></jtable>            
                

            </div>
        </div>
    </div>

   
</x-app-layout>


@section('page-js')


<script type="text/javascript">

    bus.$on("button_clicked", function(id, name){
            alert(id);
            let search = {
                address : $("#address").val(),
                number_offices : $("#office").val(),
                number_tables : $("#table").val(),
                sqm_min : $("#sqm_min").val(),
                sqm_max : $("#sqm_max").val(),
                price_min : $("#price_min").val(),
                price_max : $("#sqm_max").val()
            }    

            alert(search);
        
        });
        

    $(document).ready(function() {    
        

         var vm = new Vue({
                el: '#app',
                data() {
                  return {
                    form_id: "form",
                    form_name: "form"
                  }
                },
                created(){
                    
                },
                methods: 
                {   
                    handle: function( name, value ){
                        //_.set(this.dict , ''+name, value);
                        console.log(this.dict);
                    }
                }
            });
        
        

        

        

    });


</script>
@endsection

