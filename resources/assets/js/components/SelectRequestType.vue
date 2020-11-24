<template>
    <div>
        <div class="card">
            <div class="card-body ">
                <div class="text-center">
                    <button @click="ticketRequest()" class="btn  btn-lg btn-outline-success"><i class="fa fa-bell"></i> ایجاد درخواست </button>
                    <button class="btn btn-outline-secondary btn-lg disabled"> <i class="fa fa-question"></i> پاسخ سریع به سوال </button>
                    <button class="btn btn-outline-secondary  btn-lg disabled"> <i class="fa fa-phone"></i>  پیگیری درخواست</button>
                </div>
               <div class="p-5">
                   <div class="alert alert-info">
                       خوش آمدید!
                       <br>
                       برای ایجاد یک درخواست جدید روی <strong class="blockquote"> "ایجاد درخواست جدید" </strong> کلیک کنید.
                   </div>
                   <div class="alert alert-warning">
                      بخش پاسخ سریع به سوالات مطرح شده در تماس ها به زودی راه اندزای خواهد شد.
                   </div>
                   <div class="alert alert-warning">
                      بخش پیگیری درخواست های ثبت شده به زودی راه اندزای خواهد شد.
                   </div>
               </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name: "SelectRequestType",
        props: [],
        data: function () {
            return {}
        },
        methods: {
            ticketRequest() {
                this.$emit("select", "createTicket")
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
