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
                                <textarea class="form-control" :id="key" v-model="fields[key]" cols="30"
                                          rows="10"></textarea>
                            </div>

                            <div class="form-group" v-if="field.type=='city'">
                                <label :for="key">{{ field.label }}: </label>
                                <select :id="key" v-model="fields[key]" class="form-control">
                                    <option v-for='city in cities' :value="city.id">{{ city.name }}</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="field.type=='office'">
                                <label :for="key">{{ field.label }}: </label>
                                <select :id="key" v-model="fields[key]" class="form-control">
                                    <option v-for='office in offices' :value="office.id">{{ office.name }}</option>
                                </select>
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
        props: ["ticket_subject", "department","offices",'cities'],
        data: function () {
            return {
                loading: false,
                fields: {},
            }
        },
        methods: {
            saveTicket() {
                let vm = this;
                this.loading = true;
                axios.post("/answering/tickets", this.collectData())
                    .then(res => {
                        vm.ticketStored(res.data.data)
                    })
                    .catch(function (error) {
                        if (error.response) {
                            // Request made and server responded
                            let errors = error.response.data.errors;

                            let errorMsg = "";

                            for (error in errors) {
                                errorMsg += `<li class="text-right">${errors[error]}</li>`;
                            }

                            errorMsg = `<ul>${errorMsg}</ul>`

                            Swal.fire({
                                title: 'مشکلی پیش آمده است!',
                                icon: 'error',
                                html: errorMsg,
                                showCloseButton: true,
                                showCancelButton: false,
                                showConfirmButton: true,
                                confirmButtonText: "بسیار خب",
                                focusConfirm: true,
                            })


                        }
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
                let msg = "درخواست ثبت شد"
                    + "<br>"
                    + "شماره پیگیری:"
                    + ticket.id;
                Swal.fire({
                    title: 'انجام شد',
                    icon: 'success',
                    html: msg,
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: "مشاهده جزییات درخواست",
                    focusConfirm: true,
                })
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
