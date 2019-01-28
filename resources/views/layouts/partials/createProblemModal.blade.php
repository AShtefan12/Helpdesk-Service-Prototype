<!-- Modal -->
<div class="modal fade" id="createProblemModal" tabindex="-1" role="dialog" aria-labelledby="createProblemModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #7386D5">
                <h4 class="modal-title" id="createProblemModal" style="color: #ffffff"><b>New Problem</b></h4>
            </div>
            <div class="modal-body">
                <!-- Create a new problem form in this div -->

                <div class="form-group pt-2">
                    <label for="type"><h5><b>Problem Type</b></h5></label>
                    <select class="form-control" name="Problem Type" id="type" onchange="problemTypeFunction()">
                        <option value="" id="select" selected disabled>Select</option>
                        <option value="Hardware" id="hardware">Hardware</option>
                        <option value="Software" id="software">Software</option>
                        <option value="Other" id="other">Other</option>
                    </select>
                </div>

                <div id="problemType">

                </div>

                <p style="padding-bottom: 6px"></p>

                    <label for="problem"><h5><b>Specific Issue</b></h5></label>
                    <select class="form-control" name="Specific Issue" id="problem">
                        <option value="" selected disabled>Select</option>
                        <option value="Corrupt Disk">Corrupt Disk</option>
                        <option value="Printer Jam">Printer Jam</option>
                        <option value="Internet Connection">Internet Connection</option>
                    </select>
                <div id="newCallSwitchDiv" style="padding-top: 5px">
                    <label>Urgency</label><br>
                    <span class="switch newCallSwitch">
                        <input type="checkbox" class="switch" id="newCallSwitch">
                        <label for="newCallSwitch"></label>
                    </span>
                </div>

                <p style="padding-bottom: 6px"></p>

                <h5><b>Summary</b></h5>
                    <input class="form-control" type="text" id="summary" placeholder="Summary of the problem">

                <p style="padding-bottom: 6px"></p>

                <h5><b>Call Log</b></h5>
                    <input class="form-control" type="text" placeholder="Enter caller Name or ID">

                <p style="padding-bottom: 1px"></p>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th width="14.3%" style="border-color: #6c757d">Name</th>
                            <th width="14.3%" style="border-color: #6c757d">ID</th>
                            <th width="14.3%" style="border-color: #6c757d">Job</th>
                            <th width="14.3%" style="border-color: #6c757d">Dept.</th>
                            <th width="14.3%" style="border-color: #6c757d">Tel No.</th>
                            <th width="14.3%" style="border-color: #6c757d">Date</th>
                        </tr>
                        <tr>
                            <td width="14.3%" style="border-color: #6c757d"></td>
                            <td width="14.3%" style="border-color: #6c757d"></td>
                            <td width="14.3%" style="border-color: #6c757d"></td>
                            <td width="14.3%" style="border-color: #6c757d"></td>
                            <td width="14.3%" style="border-color: #6c757d"></td>
                            <td width="14.3%" style="border-color: #6c757d">4/10/2018 at 15:04</td>
                        </tr>
                    </table>

                <p style="padding-bottom: 6px"></p>

                <h5><b>Description</b></h5>
                    <textarea class="form-control" id="description" rows="4" cols="50" placeholder="Description of the problem"></textarea>

                <p style="padding-bottom: 6px"></p>

                <h5><b>Specialist Allocation</b></h5>
                     <select class="form-control" name="problemType" id="sAllocation">
                         <option value="Automatic">Automatic</option>
                         <option value="Specialist 1">Bert - 5 Problems</option>
                         <option value="Specialist 2">Clara - 8 Problems</option>
                     </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat" data-dismiss="modal" onclick="clearModalData()">Close</button>
                <router-link :to="{ name: 'problems' }">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Save</button>
                </router-link>
            </div>
        </div>
    </div>
</div>