<template>
    <div>
        <h5 class="pt-2">
            Call C299
        </h5>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-md-12 pb-2">
                <div class="card">
                    <div class="card-header">
                        Caller
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <strong class="col-4">ID:</strong>
                            <p class="col-8">B1001</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Name:</strong>
                            <p class="col-8">Raymond Wilkinson</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Job:</strong>
                            <p class="col-8">It Specialist</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Department:</strong>
                            <p class="col-8">IT</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Telephone No.:</strong>
                            <p class="col-8">+44 7904 860610</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header">
                        Call Information
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <strong class="col-4">ID:</strong>
                            <p class="col-8">C299</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Operator:</strong>
                            <p class="col-8">Alice</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Date:</strong>
                            <p class="col-8">13th November 2018</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Time:</strong>
                            <p class="col-8">12:41</p>
                        </div>
                        <div class="row">
                            <strong class="col-4">Call Length:</strong>
                            <p class="col-8">1 minute 3 seconds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <h5>Problems</h5>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Summary</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">XK681</th>
                        <td>Faulty ink cartridges</td>
                        <td>Printing</td>
                        <td><span class="badge badge-dark">Not Started</span></td>
                        <td>
                            <router-link :to="{ name: 'problems' }">
                                <i class="fas fa-arrow-right" style="color: #7386D5;"></i>
                            </router-link>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">XK690</th>
                        <td>Broken printer in the break room</td>
                        <td>Printing</td>
                        <td><span class="badge badge-success">Solved</span></td>
                        <td>
                            <router-link :to="{ name: 'problems' }">
                                <i class="fas fa-arrow-right" style="color: #7386D5;"></i>
                            </router-link>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {}
</script>
