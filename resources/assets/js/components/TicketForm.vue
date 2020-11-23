<template>
    <div>
        <form>
            <div class="row">
                <div class="col-md-12" v-for="(field,key) in ticket_subject.fields">
                    <div class="form-group" v-if="field.type=='text'">
                        <label :for="key">{{ field.label }}</label>
                        <input type="text" class="form-control" :id="key" v-model:="fields">
                    </div>
                    <div class="form-group" v-if="field.type=='richtext'">
                        <label :for="key">{{ field.label }}</label>
                        <textarea class="form-control" :id="key" v-model:="fields[key]" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-outline-success" @click.prevent="submitForm">ذخیره</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "TicketForm",
        components: {},
        props: ["ticket_subject","department"],
        data: function () {
            return {
                loading: false,
                fields: {
                    address:"add",
                    body:"d23",
                }
            }
        },
        methods: {
            saveTicket() {
                let vm = this;
                this.loading = true;
                axios.post("/answering/tickets", this.collectData())
                    .then(res => {
                        console.log(res);
                    });
            },
            collectData() {

                return {
                    ...{
                        ticket_subject_id: this.ticket_subject.id,
                        department_id: this.department.id,
                    },
                    ...this.fields
                }
            },
            submitForm() {
                this.saveTicket();
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
