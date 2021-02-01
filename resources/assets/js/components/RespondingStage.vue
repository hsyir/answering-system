<template>
    <div>
        <div v-if="ifStep('selectRequestType')">
            <select-request-type @select="selectStep"></select-request-type>
        </div>
        <div v-if="ifStep('createTicket')">
            <create-ticket
                    :departments="departments"
                    :offices="offices"
                    :cities="cities"
                    @cancel="crateTicketCancel"></create-ticket>
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
            SelectRequestType,

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
            },
            getDepartments() {
                let vm = this;
                axios.get("/answering/getDepartments")
                    .then(res => {
                        vm.departments = res.data.data;
                    })
            },
            getOffices() {
                let vm = this;
                axios.get("/answering/getOffices")
                    .then(res => {
                        vm.offices = res.data.data;
                    })
            },
            getCities() {
                let vm = this;
                axios.get("/answering/getCities")
                    .then(res => {
                        vm.cities = res.data.data;
                    })
            },
            crateTicketCancel(){
                this.goToStep("selectRequestType")
            }
        },
        mounted() {
            this.getDepartments();
            this.getOffices();
            this.getCities();
        },
    }
</script>

<style scoped>

</style>
