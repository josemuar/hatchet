<template>
  <div style='display: inline'>
  <button type="button" v-bind:id="id" v-bind:name="name" v-bind:class="[button_class]"  v-on:click="clicked">
  
    <i  v-bind:class="[spinner_class]"  v-if="spinner==1" ></i>
    {{ label }}
  </button>
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
      _button_class: {
       type: String,
       required: true
      },
      _spinner: {
       required: true,
       default: 1
     }

    },

    computed: {},
    
    data() {
      return {
        id : this._id,
        name : this._name,
        label : this._title,
        spinner : this._spinner,
        spinner_class : "fa fa-spinner fa-spin",
        button_class: this._button_class
      }
    },

    methods: 
    {
      initialise(){  
      },

      handle: function( _status  ){
        

        this.spinner = _status;
        //this.spinner_class = _class;

        //if( param === 'initiated')

        //if( param === 'completed')

        //if( param === 'with_error')

      },

      clicked: function(){
        
        bus.$emit("button_clicked", this.id, this.name );

      }

    },

    mounted(){
      bus.$on("spinner" , this.handle );
    },

    created: function(){    
    }
};
</script>