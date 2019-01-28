<template>
    <div class="loading-screen" v-if="loading">
        <div class="loader"></div>
    </div>
    <div v-else>
        <h5 class="pt-2">
            Problem XK681

            <button class="float-right btn btn-success" v-if="status != 3" data-toggle="modal" data-target="#solveProblemModal">Solve</button>
        </h5>
        <problem-summary />
        <hr>

        <div class="row pb-2">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="problem-type"><strong>Problem Type</strong></label>
                    <select class="form-control" id="problem-type">
                        <option v-for="type in problemTypes" :value="type.value" v-html="type.prefix + type.name"></option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="status"><strong>Status</strong></label>
                    <select class="form-control" id="status" v-model="status">
                        <option value="1">Not Started</option>
                        <option value="2">In Progress</option>
                        <option value="3">Solved</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="specialist"><strong>Specialist Allocation</strong></label>
                    <select class="form-control" id="specialist">
                        <option value="Automatic">Automatic</option>
                        <option value="Specialist 1">Bert - 5 Problems</option>
                        <option value="Specialist 2">Clara - 8 Problems</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="urgency"><strong>Urgent</strong></label> <br>
                    <span class="switch switch-sm">
                        <input type="checkbox" checked class="switch" id="urgency">
                        <label for="urgency"></label>
                    </span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="serial-number"><strong>Hardware Serial No.</strong></label>
                    <input type="text" class="form-control" id="serial-number" placeholder="Enter serial number">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="operating-system"><strong>Operating System</strong></label>
                    <select class="form-control" id="operating-system">
                        <option value="0" disabled>Select an operating system</option>
                        <option value="1">Windows</option>
                        <option value="2">macOS</option>
                        <option value="3">Linux</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="software-name"><strong>Software Name</strong></label>
                    <input type="text" class="form-control" id="software-name" placeholder="Enter software name">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="software-version"><strong>Software Version</strong></label>
                    <input type="text" class="form-control" id="software-version" placeholder="Enter software version">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5> Call Log </h5>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Job</th>
                        <th scope="col">Department</th>
                        <th scope="col">Tel No.</th>
                        <th scope="col">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">B007</th>
                        <td>Bob Ross</td>
                        <td>Analyst</td>
                        <td>Billing</td>
                        <td>911</td>
                        <td>21/08/2019 at 16:03</td>
                    </tr>
                    <tr>
                        <th scope="row">B007</th>
                        <td>Bob Ross</td>
                        <td>Analyst</td>
                        <td>Billing</td>
                        <td>911</td>
                        <td>21/08/2019 at 16:03</td>
                    </tr>
                    <tr>
                        <th scope="row">B007</th>
                        <td>Bob Ross</td>
                        <td>Analyst</td>
                        <td>Billing</td>
                        <td>911</td>
                        <td>21/08/2019 at 16:03</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row pb-3">
            <div class="col-md-12 pb-4" v-if="status == 3 && solution">
                <solution :solution="solution"></solution>
            </div>
            <div class="col-md-12">
                <h5>Description</h5>
                <description></description>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h5>Notes</h5>
               <notes></notes>
            </div>
        </div>

        <solve-problem-modal @solved="solved"></solve-problem-modal>
    </div>
</template>

<script>
    import Notes from './Notes'
    import Solution from './Solution'
    import Description from './Description'
    import ProblemSummary from './ProblemSummary'
    import SolveProblemModal from './SolveProblemModal'

    export default {
        components: {
            Description, ProblemSummary, Notes, SolveProblemModal, Solution
        },

        watch: {
            status(newValue, oldValue) {
                if (newValue == 3 && !this.solution) {
                    this.status = oldValue
                    $("#solveProblemModal").modal()
                }
            }
        },

        data() {
            return {
                loading: false,
                problemTypes: [
                    { value: 1, name: 'Printing', children: [{ value: 2, name: 'Printer Paper Jam', children: []}, { value: 3, name: 'Printer No Ink', children: [] }] },
                    { value: 4, name: 'Hard Disk Crash', children: [] },
                    { value: 5, name: 'Word Processing', children: [] },
                    { value: 6, name: 'Login Error', children: [] },
                ],
                previousProblems: [
                    {id: 'XK099', summary: 'Ink cartridges not working'},
                    {id: 'XK098', summary: 'Printer needs ink'},
                ],
                status: 1,
                solution: null,
            }
        },

        created() {
            let types = []
            this.getProblems('', this.problemTypes, types)

            this.problemTypes = types
        },

        methods: {
            getProblems(prefix, problems, types) {
                for (var i in problems) {
                    let type = problems[i]
                    types[types.length] = {
                        value: type.value,
                        name: type.name,
                        prefix: prefix,
                    }

                    this.getProblems(prefix + '&nbsp;&nbsp;', type.children, types)
                }
            },

            solved(solution) {
                this.solution = solution
                this.status = 3
            }
        }
    }
</script>
