<template>
    <div>
        <div class="card">
            <div class="card-header">ثبت اطلاعات تیکت</div>
            <div class="card-body">
                <div>
                    <div>
                        <strong>واحد سازمانی:</strong> {{ department.name }}
                    </div>
                    <div>
                        <strong>موضوع درخواست:</strong> {{ ticket_subject.title }}
                    </div>
                </div>
                <hr>

                <form>
                    <div class="row">
                        <div class="col-md-12" v-for="(field,key) in ticket_subject.fields">
                            <div class="form-group" v-if="field.type=='text'">
                                <label :for="key">{{ field.label }}: </label>
                                <input type="text" class="form-control" :id="key" v-model="fields[key]">
                            </div>
                            <div class="form-group" v-if="field.type=='richtext'">
                                <label :for="key">{{ field.label }}: </label>
                                <textarea class="form-control" :id="key" v-model="fields[key]" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-outline-success" @click.prevent="submitForm">ذخیره</button>
                            <button class="btn btn-outline-danger" @click.prevent="cancelForm">انصراف</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TicketForm",
        components: {},
        props: ["ticket_subject", "department"],
        data: function () {
            return {
                loading: false,
                fields: {}
            }
        },
        methods: {
            saveTicket() {
                let vm = this;
                this.loading = true;
                axios.post("/answering/tickets", this.collectData())
                    .then(res => {
                        vm.ticketStored(res.data.data)
                    });
            },
            collectData() {
                return {
                    ticket_subject_id: this.ticket_subject.id,
                    department_id: this.department.id,
                    ...this.fields
                }
            },
            submitForm() {
                this.saveTicket();
            },
            ticketStored(ticket) {
                console.log(ticket)
                this.resetForm();
                this.$emit("ticketStored", ticket)
            },
            resetForm() {
                this.fields = {};
            },
            cancelForm() {
                this.resetForm();
                this.$emit("cancelForm");
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
