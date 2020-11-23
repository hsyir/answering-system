<template>
    <div>
        <button @click="ticketRequest()" class="btn btn-outline-success">ایجاد درخواست</button>
        <button  class="btn btn-outline-success">سوال</button>
        <button  class="btn btn-outline-success">پیگیری درخواست</button>
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
               this.$emit("select","createTicket")
           }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
