<template>
    <table class="table table-responsive-md table-striped problems-filter-table">
        <thead>
        <tr>
            <th class="border-top-0 p-0 pb-2 h-100">
                <div style="height: 26px;">
                    <button class="btn btn-outline-dark float-right" id="filterDropdownButton" style="max-width: 35px; min-width: 35px; padding: 0.375rem 0;" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-filter"></i>
                    </button>

                    <div class="dropdown-menu dropdown">
                        <form role="form">
                            <div class="form-group pl-3 pr-3">
                                <label for="filter_type">Type</label>
                                <select id="filter_type" class="form-control" style="width: 300px;">
                                    <option value="0" selected>All</option>
                                    <option value="1">Printing</option>
                                    <option value="2">Hard Disk Crash</option>
                                    <option value="3">Word Processing</option>
                                    <option value="4">Login Error</option>
                                </select>
                            </div>
                            <div class="form-group pl-3 pr-3">
                                <label for="filter_status">Status</label>
                                <select id="filter_status" class="form-control" style="width: 300px;">
                                    <option value="0" selected>All</option>
                                    <option value="1">Not Started</option>
                                    <option value="2">In Progress</option>
                                    <option value="3">Solved</option>
                                </select>
                            </div>
                            <div class="form-group pl-3 pr-3">
                                <label for="filter_urgency">Urgency</label>
                                <select id="filter_urgency" class="form-control" style="width: 300px;">
                                    <option value="0" selected>All</option>
                                    <option value="1">Only Urgent</option>
                                    <option value="2">Only Not Urgent</option>
                                </select>
                            </div>
                            <div class="pr-3">
                                <button type="button" @click="filter" class="float-right btn btn-info">
                                    Filter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
            <problem-list-item :active="true" id="XK681" summary="Faulty ink cartridges"></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
            <problem-list-item></problem-list-item>
        </tbody>
    </table>
</template>

<script>
    import ProblemListItem from './ProblemListItem'

    export default {
        components: {
            ProblemListItem
        },

        methods: {
            filter() {
                $("#filterDropdownButton").dropdown('toggle')
            }
        }
    }
</script>