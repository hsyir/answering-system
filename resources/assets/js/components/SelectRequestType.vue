<template>
    <div>
        <button @click="ticketRequest()" class="btn btn-outline-success">درخواست پیگیری</button>
    </div>
</template>

<script>

    export default {
        name: "SelectRequestType",
        props: [],
        data: function () {
            return {
            }
        },
        methods: {
           ticketRequest(){
               this.$emit("select","ticket")
           }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
