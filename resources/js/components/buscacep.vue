<script>
    export default{
        methods: {
            onBlurCep(){
                if(document.getElementById("cep").value){
                    var res = document.getElementById("cep").value.replace('.', "");
                    res = res.replace('-', ""); 
                    res =res.replace('.', "");
                    $.get('https://api.postmon.com.br/v1/cep/'+res, function(data){
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
        <input type="text" class="form-control" data-mask="00000-000" id="cep" name="cep" @blur="onBlurCep" placeholder="">
    </div>
</template>

<style scoped=""></style>