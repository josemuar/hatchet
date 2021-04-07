<template>
  <div>

    <!-- BEGIN -->
    <div class="container">

    {{ prices }}


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
              <input type="text" v-model='address' class="form-control" id="address" name="address" aria-describedby="office address" placeholder="Enter office address">
              </div>
            </div>

            <!-- 2nd column -->
            <div class="col-sm">
              <jlmaselect2 _id='price_min' _name='price_min' _title='PRICE MIN' _fgroup_class="col-md-12 mb-3" _multiple=0  _required=1 _value='' :_items=prices ></jlmaselect2> 
            </div>
        </div>
      </div>
      <div class="card-footer">
        <jlmabutton _id='submit' _name='submit' _spinner=0 _title='Search' _button_class="btn  btn-primary m-1" > </jlmabutton>
      </div>
    </div>



        


    </div>

    <!-- END -->

    <hr/>

    <h1>{{label}}</h1>
    

    <table  v-bind:id="id" v-bind:name="name" v-bind:class="[ this._table_class, 'display' ]" width='100%' > 
      <caption>{{label}}</caption>

      <thead>
        <tr>
        <th> Name </th>
        <th> Price </th>
        <th> Offices </th>
        <th> Tables </th>
        <th> Sqm </th>
        </tr>
      </thead>
    
      <tbody>
        <tr v-for='(row , index) in data' :key='row.id' >

          <td v-for='(item, key, index) in row' :key='key' v-if="key != 'id'">
            {{ item }}
          </td>

        </tr>
      </tbody>
      
    </table>
  </div>
</template>


<script>


export default {
  props: {
    _id: {
     type: String,
     required: true
    },
   _name: {
     type: String,
     required: true
   },
   _title: {
     type: String,
     required: true
   },

   _table_class: {
     type: String,
     required: true
   },

   _prices: {
     type: String,
     required: true
   },
   
  },

  watch:{

  },
  
  computed: {},
  
  data() {
     return {
        id : this._id,
        name : this._name,
        label : this._title,
        headers: this._headers,
        address : 'Hay',
        number_offices : null,
        number_tables : null,
        sqm_min : null,
        sqm_max : null,
        price_min : null,
        price_max : null,
        data : null,
        prices: this._prices


     }
  },

  methods: {        
   		initialise()
      {
         


        this.load();

      
      },

      load()
      {
        
        var config = {
          headers: {'Accept' : 'application/json', 'Access-Control-Allow-Origin': '*' }
        };

            var bounced = _.debounce(function(){
              bus.$emit("spinner", 0);
            }, 500);

            bus.$emit("spinner", 1);

            axios.post('http://127.0.0.1:9000/', { 
              params:{ 
                'address'  : this.address,
                'offices'  : this.number_offices,
                'tables'  : this.number_tables,
                'sqm_min'  : this.sqm_min,
                'sqm_max'  : this.sqm_max,
                'price_min'  : this.price_min,
                'price_max'  : this.price_max,
                }

              }, 
              config
            )
            .then(function(response) {
              this.data = response.data;
              console.log(response.data);
              bounced();
            }.bind(this))
            .catch(function (error) {
              
              bounced();
            });

          
      },


  },

  mounted(){
    this.initialise();
  },

  updated: function(){
  },

  created: function(){



  }

};
</script>