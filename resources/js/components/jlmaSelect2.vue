<template>
  <div v-bind:class="[fgroup_class, 'form-group' ]">
    <label for="inputtext1" class="ul-form__label">{{ label }}</label>
    <select class='form-control' v-bind:id="id" v-bind:name="name" :multiple="_multiple == 1" :required="_required == 1"   v-bind:value="value" v-model="value">
    </select>
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
      _value: {
      required: true
      },
      _fgroup_class: {
       type: String,
       required: false
     },
     _multiple: {
       required: false,
       default: 0
     },
     _required: {
       required: false,
       default: 0
     },
     _items: {
        required: true
      },

    },

    computed: {},
    
    data() {
      return {
          id : this._id,
          name : this._name,
          label : this._title,
          fgroup_class: this._fgroup_class,
          content: this.value,
          multiple : false,
          value : this._value,
          items: this._items
      }
    },

    methods: 
    {
      initialise(){  


        var vm = this;

        if(this._multiple == 0)
        vm.items.splice(0, 0, { id: '' , text: 'any' });

        $("#"+this.id).select2({
          maximumSelectionLength: 2,
          theme : 'bootstrap4',
          data : vm.items
         })
         .val(this.value)
         .trigger("change")
         .on('change', function(){
            vm.$emit('input', $("#"+this.id).val() );
            vm.$emit( "addtodict", vm.name,  $("#"+this.id).val() );
        }.bind(vm));
      },

      handle: function( param ){
        this.value = param;
      }

    },
    mounted(){
      this.initialise();
      //this.$on("input" , this.handle );
      console.log("mounted select 2...");
    },
    created: function(){}
};
</script>