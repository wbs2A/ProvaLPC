<script>
    export default{
        methods: {
            onBlurCep(){
                if(document.getElementById("cep").value){
                    $.get('https://api.postmon.com.br/v1/cep/'+document.getElementById("cep").value, function(data){
                        if (data) {
                            $("#bairro").val(data.bairro);
                            $("#cidade").val(data.cidade);
                            $("#estado").val(data.estado_info.nome);
                            $("#rua").val(data.logradouro);
                    
                        }
                    });
                }
            }
        }
    }

</script>

<template>
    <div class="col-2 mb-3">
        <label for="cep" class="col-form-label text-md-right">CEP</label>
        <input type="text" class="form-control" id="cep" name="cep" @blur="onBlurCep" placeholder="">
    </div>
</template>

<style scoped=""></style>