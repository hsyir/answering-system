<template>
    <div>
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success ">
                    درخواست با موفقیت ثبت شد.
                    <div class="clearfix"></div>
                    <button class="btn btn-outline-light float-left " @click.prevent="done">ثبت درخواست جدید</button>

                    <div class="clearfix"></div>

                </div>
                <div class="text-success h3">
                    <p><strong>کد پیگیری:</strong> {{ ticket.id }}</p>
                </div>
                <div>
                    <p><strong>واحد سازمانی پیگیری کننده:</strong> {{ ticket.department.name }}</p>
                </div>
                <div>
                    <p><strong>موضوع درخواست:</strong> {{ ticket.ticket_subject.title }}</p>
                </div>

                <div class="col-md-12" v-for="(field,key) in ticket.ticket_subject.fields">
                    <div class="form-group" v-if="field.type=='text'">
                        <label :for="key">{{ field.label }}: </label>
                        <input type="text" class="form-control" :id="key" :value="ticket[key]" readonly>
                    </div>
                    <div class="form-group" v-if="field.type=='richtext'">
                        <label :for="key">{{ field.label }}: </label>
                        <textarea class="form-control" :id="key" :value="ticket[key]" cols="30" rows="10" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "ShowTicket",
        components: {},
        props: ["ticket"],
        data: function () {
            return {
                loading: false,
            }
        },
        methods: {
            done(){
                this.$emit("done");
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
