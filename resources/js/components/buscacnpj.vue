<script>
    export default{
      data(){
         return {
                a: ''
            }
      },
        methods: {
            getCnpj(){
                this.a= document.getElementById('index').action.replace('register','userInsert')+'/1'+'/'+document.getElementById("cnpj").value;
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });
                $.ajax({
                  url: this.a,
                  method: 'get',
                  success: function(result){
                        if(result['resposta']){
                          var te;
                          var te2;
                          te2=document.getElementById('fisica-cpf');
                          te2.parentNode.style.display='none';
                                te=document.getElementById('juridica-cnpj');
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
    <div class="col mb-3">
        <label for="cnpj" class="col-form-label text-md-right">CNPJ</label>
        <input type="number" class="form-control" id="cnpj" maxlength="14" name="cnpj" placeholder="CNPJ"  @blur="getCnpj" value="">
    </div>
</template>

<style scoped=""></style>