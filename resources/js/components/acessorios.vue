<template>
    <span>
    	<div class="row" v-for="item in rios">
    		<input type="radio" @click="myCick" v-model="myradioUnico" class="col-1 mt-1 mb-1 mr-0"  v-bind:id="item.nome" v-bind:value="item.idacessorio">
    		<label v-bind:for="item.nome"  class="col">{{item.nome}}</label>
    	</div>
    </span>
</template>
<script>
export default {
	props:['rios'], 
    data(){
        return{
            myradioUnico:''
        }
    },
    methods:{
        myCick(event){
            this.$emit('Click', event.target.value);
        }
    }
}
</script>