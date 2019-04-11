<script>
    export default{
         props: ['categorias'], 
         methods:{
            myChange(){
                this.$emit('Select', this.mySelect);
            }
         }, 
         data(){
            return{
                mySelect:''
            }
         }
    }

</script>

<template>
     <div class="col-10  mb-3">
        <label for="categoria" class="col-form-label text-md-right">Selecione a categoria do seu carro</label>
        <select class="custom-select" id="categoria" name="categoria" required
        v-model="mySelect"
        v-on:change="myChange"
        >
            <option value="" disabled selected hidden></option>
            <option v-for="categoria in categorias" v-bind:value="categoria.idclassificacao">{{ categoria.tipo }}</option>
        </select>
    </div>
</template>

<style scoped=""></style>