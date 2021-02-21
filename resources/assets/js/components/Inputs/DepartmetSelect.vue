<template>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="department_id">دپارتمان</label>
                <select name="department_id" id="department_id" class="form-control" v-model="department_id"
                        @change="departmentSelected($event)">
                    <option value="">انتخاب نشده است</option>
                    <option v-for="department in departments" :value="department.id" :selected="department.id == department_id">{{ department.name }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12" v-if="with_subject_select">
            <div class="form-group">
                <label for="ticket_subject_id">موضوع تیکت</label>
                <select name="ticket_subject_id" id="ticket_subject_id" :value="subject_id" class="form-control">
                    <option value="">انتخاب نشده است</option>
                    <option v-for="subject in subjects" :value="subject.id" :selected="subject.id == subject_id">{{ subject.title }}</option>
                </select>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "DepartmentSelect",
        props: ["initial_department_id", "initial_subject_id", "with_subject_select"],
        data: function () {
            return {
                department_id: this.initDepartmentId(),
                subject_id: this.initSubjectId(),
                departments: {},
                subjects: {},
            }
        },
        methods: {
            getDepartments() {
                let vm = this;
                axios.get("/answering/getDepartments")
                    .then(res => {
                        vm.departments = res.data.data;
                    })
            },
            initDepartmentId() {
                return this.initial_department_id
            },
            initSubjectId() {
                return this.initial_subject_id
            },
            departmentSelected(e) {
                let department_id = e.target.value;
                this.subjects =
                    department_id
                        ? _.keyBy(this.departments, "id")[department_id]["ticket_subjects"]
                        : [];
            }
        },
        mounted() {
            this.getDepartments();
        },
        watch: {
            departments: function (newVal, oldVal) {
                this.subjects =
                    this.department_id
                        ? _.keyBy(this.departments, "id")[this.department_id]["ticket_subjects"]
                        : [];
            }
        }
    }
</script>

<style scoped>

</style>
