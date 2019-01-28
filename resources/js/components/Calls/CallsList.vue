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
                                <label for="filter_caller">Caller</label>
                                <select id="filter_caller" class="form-control" style="width: 300px;">
                                    <option value="0" selected>All</option>
                                    <option value="1">Raymond Wilkinson</option>
                                    <option value="2">John Doe</option>
                                </select>
                            </div>
                            <div class="form-group pl-3 pr-3">
                                <label for="filter_date_min">Minimum Date</label>
                                <input class="form-control" id="filter_date_min" placeholder="Pick a minimum date" type="date">
                            </div>
                            <div class="form-group pl-3 pr-3">
                                <label for="filter_date_max">Maximum Date</label>
                                <input class="form-control" id="filter_date_max" placeholder="Pick a maximum date" type="date">
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
            <call-list-item :active="true" name="Raymond Wilkinson" time="13th November 2018 at 12:41"></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
            <call-list-item></call-list-item>
        </tbody>
    </table>
</template>

<script>
    import CallListItem from './CallListItem'

    export default {
        components: {
            CallListItem
        },

        methods: {
            filter() {
                $("#filterDropdownButton").dropdown('toggle')
            }
        }
    }
</script>