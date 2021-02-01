<template>
    <div>
        <div v-if="ifStep('selectSubject')">
            <select-subject :departments="departments" @subjectSelected="subjectSelected"
                            @cancel="cancel"></select-subject>
        </div>
        <div v-if="ifStep('ticketForm')">
            <ticket-form :ticket_subject="selected_subject" :department="selected_department"
                         :offices="offices"
                         :cities="cities"
                         @ticketStored="newTicketStored"
                         @cancelForm="cancelForm">
            </ticket-form>
        </div>
        <div v-if="ifStep('showTicket')">
            <show-ticket :ticket="lastTicket" @done="goToStep('selectSubject')"></show-ticket>
        </div>
    </div>
</template>

<script>
    import SelectSubject from "./SelectSubject";
    import TicketForm from "./TicketForm";
    import ShowTicket from "./ShowTicket";

    export default {
        name: "CreateTicket",
        components: {ShowTicket, TicketForm, SelectSubject},
        props: ["call", "offices", "departments", "cities"],
        data: function () {
            return {
                loading: false,
                step: "selectSubject",
                selected_subject: {
                    fields: {}
                },
                selected_department: {},
                lastTicket:{},

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
            subjectSelected(ticket_subject, department) {
                this.selected_subject = ticket_subject;
                this.selected_department = department;
                this.goToStep("ticketForm")
            },
            newTicketStored(ticket) {
                this.lastTicket = ticket;
                this.goToStep("showTicket")
            },
            cancelForm() {
                this.goToStep("selectSubject")
            },
            cancel() {
                this.$emit("cancel")
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
