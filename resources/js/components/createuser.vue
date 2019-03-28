<script>
    export default{
        data(){
            return {
                selected: ''
            }
        }
    }

</script>

<template>
    <div>
        <select v-model="selected" id="tipo" type="tipo" class="form-control" name="tipo" value="" required>
        <option>Fisica</option>
        <option>Jurídica</option>
    </select>
    <div id='fisico' v-if="selected === 'Fisica'" class="form-group row">
                            <div class="col-3 mb-3">
                                <label for="cpf" class="col-form-label text-md-right">CPF</label>
                                <input type="number" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="CPF" value="" required>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="rg" class="col-form-label text-md-right">RG</label>
                                <input type="text" class="form-control" name="rg" id="rg" placeholder="RG" value="" required="">
                            </div>
                            <div class="col-3 mb-3">
                                <label for="nascimento" class="col-form-label text-md-right" >Data de nascimento</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="">
                            </div>
                            <div class="col-3 mb-3">
                                <label for="sexo" class="col-form-label text-md-right" >Sexo</label>
                                <input type="text" class="form-control" id="sexo" name="sexo" placeholder="">
                            </div>

                        </div>
                        <div id='juridico' v-else-if="selected === 'Jurídica'" class="form-group row">
                            <div class="col-4 mb-3">
                                <label for="cnpj" class="col-form-label text-md-right">CNPJ</label>
                                <input type="number" class="form-control" id="cnpj" maxlength="14" name="cnpj" placeholder="CNPJ" value="" required>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="razaoSocial" class="col-form-label text-md-right" >Razão Social</label>
                                <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="">
                            </div>

                        </div>
    </div>

</template>

<style scoped=""></style>