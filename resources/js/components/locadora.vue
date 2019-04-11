<script>
    export default{
         props: ['locadoras', 'localDe']
    }

</script>

<template>
    <div class="col-12 p-0 mb-3">
        <label class="col-form-label text-md-right" for="saa">Local de {{localDe}}</label>
        <select class="custom-select" id="saa" v-bind:name="'locadora' + localDe" required>
            <option value="" disabled selected hidden></option>
            <option v-if="!locadoras" value="" disabled selected>escolha uma categoria</option>
            <option v-for="locadora in locadoras" v-bind:value="locadora.idLocadora">{{ locadora.nome }}</option>
        </select>
    </div>
</template>

<style scoped=""></style>