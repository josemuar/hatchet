<template>
  <div>
    <h1>{{label}}</h1>
    {{_address}}
    <table  v-bind:id="id" v-bind:name="name" v-bind:class="[ this._table_class, 'display' ]" width='100%' > 
      <caption>{{label}}</caption>
      <thead>
        <tr>
        <th> Name </th>
        <th> Offices </th>
        <th> Tables </th>
        <th> Sqm (meters<sup>2</sup>) </th>
        <th> Price (AUD)</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for='(row , index) in dataset' :key='row.id' >
          <td v-for='(item, key, index) in row' :key='key' v-if="key != 'id'">
            {{ item }}
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>


<script>

//import jlmabutton from './jlmaButton.vue'
//import jlmaselect2 from './jlmaSelect2.vue'

export default {
  name: 'JTable',
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

   _address: {
     type: String,
     required: false
   },
   _number_offices: {
     type: String,
     required: false
   },
   _number_tables: {
     type: String,
     required: false
   },
   _sqms: {
     required: false
   },
   _prices: {
     required: false
   }

  },

  watch:{

  },
  
  computed: {},
/*
  components: {
      jlmabutton,
      jlmaselect2
  },
*/
  data() {
     return {
        id : this._id,
        name : this._name,
        label : this._title,
        headers: this._headers,
        address : this._address,
        number_offices : this._number_offices,
        number_tables : this._number_tables,
        sqms : this._sqms,
        prices : this._prices,
        dataset : null,
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
                'address'  : this._address,
                'offices'  : this._number_offices,
                'tables'  : this._number_tables,
                'sqms'  : this._sqms,
                'prices'  : this._prices,
                }

              }, 
              config
            )
            .then(function(response) {
              
              _.map(response.data, (value, key) => {
                  value['price'] = "$ "+ ( value['price'] ).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,');
              }); 

              this.dataset = response.data;
              bounced();

              if ( response.data.length == 0 )
              {
                alert("NO RECORDS WERE FOUND");
              }

            }.bind(this))
            .catch(function (error) {
              bounced();
            });

          
      },


  },

  mounted(){
    this.initialise();
    bus.$on("table_body_load" , this.load );
    console.log("mounted jtable...");
  },

  updated: function(){
  },

  created: function(){



  }

};
</script>