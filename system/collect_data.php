<div class="card pt-5 pb-5 p-5 mt-3 mb-5">
    <h4>Collect Data</h4>
    <!-- Form for collecting data -->
    <form id="collectForm">
        <!-- User ID input field -->
        <div class="mb-3">
            <label class="form-label">User ID</label>
            <input type="text" class="form-control" id="user_id" name="user_id" maxlength="8" required>
        </div>

        <!-- Location input field -->
        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" maxlength="12" required>
        </div>

        <!-- Item Code input field -->
        <div class="mb-3">
            <label class="form-label">Item Code</label>
            <input type="text" class="form-control" id="item_code" name="item_code" maxlength="12" required>
        </div>

        <!-- Quantity input field (number only) -->
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" min="1" max="9999" required>
        </div>

        <!-- Submit button to save data -->
        <button type="submit" class="btn btn-success">Save</button>

        <!-- Reset button to clear form inputs -->
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </form>

    <!-- Div to display messages (success/error) after form submission -->
    <div id="message" class="mt-3"></div>
</div>

<!-- SweetAlert2 CDN for showing success or error alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery CDN for handling AJAX and DOM manipulations -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- External JavaScript file for form handling -->
<script src="../js/collect_data.js"></script>
