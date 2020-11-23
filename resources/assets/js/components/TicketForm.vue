<template>
    <div>
        <form >
            national_code
            mobile_number
            phone_number
            body
            priority
            city_id
            office_id
            address

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
