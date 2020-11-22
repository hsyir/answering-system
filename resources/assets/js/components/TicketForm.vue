<template>
    <div>
        <form >
            
        </form>
    </div>
</template>

<script>
    export default {
        name: "TicketForm",
        components: {},
        props: ["call","offices","departments","cities"],
        data: function () {
            return {
                loading: false,
                step: "selectSubject"
            }
        },
        methods: {
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
