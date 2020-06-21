<div class="element-wrapper">
    <h6 class="element-header">Report Deck</h6>
    <div class="element-box">
    @if(\App\User::isCustomerNotRetailer())
        <form id="frmReport">
            <!-- <h5 class="form-header">Report </h5> -->
            <div class="alert alert-warning">
                Report a book that is rendered possible counterfeit and get 5 points. However, provision of false report in order to get
                points can lead to penalty deductions of 20 points.
            </div>
            <div id="add-review-msgs"></div>

            <div class="alert alert-danger" id="add-error-report-bag" style="display: none;">
                <ul id="add-review-errors">
                </ul>
            </div>

            <div class="form-group">
                <label for="ward"> Select Ward</label>
                <select class="form-control select2" name="ward" id="ward">
                    <option value="">- Select Ward -</option>
                </select>
            </div>

            <div class="form-group">
                <label for="book">Precise Location</label>
                <input type="text" name="location" id="autocomplete" class="form-control" onfocus="geolocate()" 
                placeholder="Enter a location" autocomplete="off" aria-invalid="false" aria-describedby="autocomplete-error">
                <input type="hidden" name="longitude" id="longitude">
                <input type="hidden" name="latitude" id="latitude">
            </div>

            <div class="form-group">
                <label for="book"> Book ID</label>
                <input class="form-control" placeholder="Enter Book ID" type="text" name="book" id="book" value="{{ $id }}">
            </div>

            <div class="form-group">
                <label for="store"> Enter Store ID</label>
                <input class="form-control" placeholder="Enter Store ID" type="text" name="store" id="store" value="">
                <input class="form-control" type="hidden" name="reportedBy" id="reportedBy" value="{{\App\User::loggedInUserEmail()}}">
                <input class="form-control" type="hidden" name="reportedTo" id="reportedTo" value="{{$reportedTo}}">
            </div>

            <div class="form-group">
                <label for="store"> Enter Description</label>
                <textarea class="form-control" name="description" id="description" value=""></textarea>
            </div>

            <div class="form-buttons-w">
                <button class="btn btn-primary btn-report" type="button"> Submit</button>
            </div>
        </form>
    @else
        <form id="frmReportOthers">
            <!-- <h5 class="form-header">Report </h5> -->
            <div class="alert alert-warning">
                Report a book that is rendered possible counterfeit and get points. However false alarm in order to get
                points can lead to permanent disqualification of earning points or penalty deductions depending on the
                frequency of false alarm.
            </div>
            <div id="add-review-msgs"></div>

            <div class="alert alert-danger" id="add-error-report-bag" style="display: none;">
                <ul id="add-review-errors">
                </ul>
            </div>

            <div class="form-group">
                <label for="ward"> Select Ward</label>
                <select class="form-control select2" name="ward" id="ward">
                    <option value="">- Select Ward -</option>
                </select>
            </div>

            <div class="form-group">
                <label for="book"> Book ID</label>
                <input class="form-control" placeholder="Enter Book ID" type="text" name="book" id="book" value="{{ $id }}">
            </div>

            <div class="form-group">
                <label for="store"> Enter Store ID</label>
                <input class="form-control" placeholder="Enter Store ID" type="text" name="store" id="store" value="">
                <input class="form-control" type="hidden" name="reportedBy" id="reportedBy" value="{{\App\User::loggedInUserEmail()}}">
                <input class="form-control" type="hidden" name="reportedTo" id="reportedTo" value="{{$reportedTo}}">
            </div>

            <div class="form-group">
                <label for="store"> Enter Description</label>
                <textarea class="form-control" name="description" id="description" value=""></textarea>
            </div>

            <div class="form-buttons-w">
                <button class="btn btn-primary btn-report-others" type="button"> Submit</button>
            </div>
        </form>
    @endif
    </div>
</div>