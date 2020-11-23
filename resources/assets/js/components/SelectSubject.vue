<template>
    <div> SelectSubject
        <div id="accordion">
            <div class="card" v-for="department in departments">
                <div class="card-header" :id="'head'+department.id">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse"
                                :data-target="'#dep'+department.id" aria-expanded="true"
                                :aria-controls="'dep'+department.id">
                            {{ department.name }}
                        </button>
                    </h5>
                </div>
                <div :id="'dep'+department.id" class="collapse "
                     :aria-labelledby="'head'+department.id" data-parent="#accordion">
                    <div class="card-body p-0">
                        <div class="list-group">
                            <a class="list-group-item list-group-item-action"
                               v-for="subject in department.ticket_subjects"
                               href="#"
                               @click="selectSubject(subject,department)"
                            >
                                {{ subject.title }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SelectSubject",
        props: ["departments"],
        data: function () {
            return {
                loading: false,
            }
        },
        methods: {
            selectSubject(subject,department){
                this.$emit("subjectSelected",subject,department)
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
