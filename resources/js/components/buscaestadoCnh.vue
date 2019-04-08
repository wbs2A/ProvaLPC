<script>
    export default{
      props: {
          estadoCNH: String
      },
        methods: {
            getEstadoCNH(){
              var res = document.getElementById("estadoCNH").value;
              axios.post('api/getEstadoExist/', {
                nome : res
              }).then(
                 res => {
                  if (res.data) {
                    console.log(res.data);
                    te=document.getElementById('fisica-estadoCNH');
                    te.innerText=res.data['resposta'];
                    te.parentNode.style.display='block';
                    document.getElementsByTagName('button')[0].disabled=true;

                  }
                 },
                 (error) => {
                  console.log(error);
                 });
            }
        }
    }

</script>

<template>
    <div class="col mb-3">
        <label for="estadoCNH" class="col-form-label text-md-right">Estado da CNH</label>
        <input type="text" class="form-control" name="estadoCNH" id="estadoCNH" placeholder="" v-bind:value="estadoCNH"  @blur="getEstadoCNH">
    </div>
</template>

<style scoped=""></style>