<template>
    <div>
        <div v-if="ifStep('selectSubject')">
            <select-subject :departments="departments" @subjectSelected="subjectSelected"></select-subject>
        </div>
        <div v-if="ifStep('ticketForm')">
            <ticket-form :ticket_subject="selected_subject" :department="selected_department"></ticket-form>
        </div>
    </div>
</template>

<script>
    import SelectSubject from "./SelectSubject";
    import TicketForm from "./TicketForm";

    export default {
        name: "CreateTicket",
        components: {TicketForm, SelectSubject},
        props: ["call", "offices", "departments", "cities"],
        data: function () {
            return {
                loading: false,
                step: "selectSubject",
                selected_subject: {
                    fields: {}
                },
                selected_department: {}
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
                this.selected_department=department;
                this.goToStep("ticketForm")
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
