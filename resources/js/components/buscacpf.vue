<script>
    export default{
        methods: {
            getCpf(){
              var a 
              a= document.getElementById('index').action.replace('register','userInsert')+'/0'+'/'+document.getElementById("cpf").value;
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });
                $.ajax({
                  url: a,
                  method: 'get',
                  success: function(result){
                        if(result['resposta']){
                          var te;
                          var te2;
                          te2=document.getElementById('juridica-cnpj');
                          te2.parentNode.style.display='none';
                                te=document.getElementById('fisica-cpf');
                                te.innerText=result['resposta'];
                                te.parentNode.style.display='block';
                                document.getElementsByTagName('button')[0].disabled=true;

                        }else{
                          var te;
                          var te2;
                          te2=document.getElementById('fisica-cpf');
                          te2.parentNode.style.display='none';
                                te=document.getElementById('juridica-cnpj');
                                te.parentNode.style.display='none';
                            document.getElementsByTagName('button')[0].disabled=false;                          
                        }             
                  }});
            }
        }
    }

</script>

<template>
    <div  class="col  p-0 mr-1 ml-1 mb-3">
        <label for="cpf" class="col-form-label text-md-right">CPF</label>
        <input type="number" class="form-control" id="cpf" maxlength="11" @blur="getCpf" name="cpf" placeholder="CPF" value="">
    </div>
</template>

<style scoped=""></style>