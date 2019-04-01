<style scoped="">
    .center {
        margin: auto;
        width: 50%;
        padding: 100px;
        padding-left: 20%;
    }
    .swapping-squares-spinner, .swapping-squares-spinner * {
    box-sizing: border-box;
}

.swapping-squares-spinner {
    height: 65px;
    width: 65px;
    position: relative;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}

.swapping-squares-spinner .square {
    height: calc(150px * 0.25 / 1.3);
    width:  calc(150px * 0.25 / 1.3);
    animation-duration: 1000ms;
    border: calc(65px * 0.04 / 1.3) solid #000000;
    margin-right: auto;
    margin-left: auto;
    position: absolute;
    animation-iteration-count: infinite;
}

.swapping-squares-spinner .square:nth-child(1) {
    animation-name: swapping-squares-animation-child-1;
    animation-delay: 500ms;
}

.swapping-squares-spinner .square:nth-child(2) {
    animation-name: swapping-squares-animation-child-2;
    animation-delay: 0ms;
}

.swapping-squares-spinner .square:nth-child(3) {
    animation-name: swapping-squares-animation-child-3;
    animation-delay: 500ms;
}

.swapping-squares-spinner .square:nth-child(4) {
    animation-name: swapping-squares-animation-child-4;
    animation-delay: 0ms;
}

@keyframes swapping-squares-animation-child-1 {
    50% {
        transform: translate(150%,150%) scale(2,2);
    }
}

@keyframes swapping-squares-animation-child-2 {
    50% {
        transform: translate(-150%,150%) scale(2,2);
    }
}

@keyframes swapping-squares-animation-child-3 {
    50% {
        transform: translate(-150%,-150%) scale(2,2);
    }
}

@keyframes swapping-squares-animation-child-4 {
    50% {
        transform: translate(150%,-150%) scale(2,2);
    }
}
</style>

<template>
    <div>
        <div class="loading center" v-if="loading" >
            <div class="swapping-squares-spinner">
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
                <div class="square"></div>
            </div>
        </div>

        <div v-if="error" class="error">
            <h1>{{ error }}</h1>
        </div>

        <p> {{user}}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                loading: false,
                user: null,
                error: null,
            };
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                this.error = this.user = null;
                this.loading = true;
                axios
                 .get('/api/getPFisica/').then(res=> {
                    axios.get('/api/pfisica/' + res.data)
                        .then(
                            response => {
                                this.loading = false;
                                this.user = response.data;
                            },
                            (error) => {
                                console.log(error);
                                this.error = error;
                                this.loading = false;
                            }
                        );
                },
                    (error) => {
                        console.log(error);
                        this.error = error;
                        this.loading = false;
                    })
            }
        }
    }
</script>