<template>
	<div class="row">
		<input type="radio" @click="myCick" class="col-1 mt-1 mb-1 mr-0"  v-bind:id="rios.nome" v-bind:value="rios.idacessorio">
		<label v-bind:for="rios.nome"  class="col">{{rios.nome}}</label>
	</div>
</template>
<script>
export default {
	props:['rios'], 
    methods:{
        myCick(event){
        	console.log(event.target.value);
            this.$emit('Click', event.target.value);
        }
    }
}
</script>