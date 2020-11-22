<template>
    <div>
        <div v-if="ifStep('selectRequestType')">
            <select-request-type @select="selectStep"></select-request-type>
        </div>
        <div v-if="ifStep('ticket')">
            <create-ticket></create-ticket>
        </div>
    </div>
</template>

<script>
    import SelectRequestType from "./SelectRequestType";
    import CreateTicket from "./CreateTicket";

    export default {
        name: "RespondingStage",
        props: ["call"],
        components: {
            CreateTicket,
            SelectRequestType
        },
        data: function () {
            return {
                loading: false,
                step: "selectRequestType",
                departments: {},
                offices: {},
                cities: {},
                fields: {},
            }
        },
        methods: {
            ifStep(step) {
                return step == this.step;
            },
            selectStep(step) {
                this.goToStep(step);
            },
            goToStep(step) {
                this.step = step;
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
