<template>
    <div>
        <div v-if="ifStep('selectSubject')">
            <select-subject :departments="departments" @subjectSelected="subjectSelected"></select-subject>
        </div>
        <div v-if="ifStep('ticketForm')">
            <ticket-form :ticket_subject="selected_subject" :department="selected_department"
                         @ticketStored="newTicketStored"></ticket-form>
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
                this.selected_department = department;
                this.goToStep("ticketForm")
            },
            newTicketStored(ticket) {
                Swal.fire({
                    title: 'انجام شد!',
                    text: 'درخواست مورد نظر ثبت شد',
                    icon: 'success',
                    confirmButtonText: 'بسیار خب'
                })
                this.goToStep("selectSubject")
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
