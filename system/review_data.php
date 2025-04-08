<div class="container mt-4">
    <h3>Review Data</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th> <!-- Unique ID of the user | Natatanging ID ng user -->
                <th>Location</th> <!-- Location of the item | Lokasyon ng item -->
                <th>Item Code</th> <!-- Code of the item | Kodigo ng item -->
                <th>Quantity</th> <!-- Number of items | Dami ng item -->
                <th>Date Time</th> <!-- Date and time of entry | Petsa at oras ng pagpasok -->
                <th>Actions</th> <!-- Buttons for editing and deleting | Mga pindutan para sa pag-edit at pagbura -->
            </tr>
        </thead>
        <tbody id="dataTable">
            <!-- Data will be loaded here via AJAX | Ang data ay ilalagay dito gamit ang AJAX -->
        </tbody>
    </table>

    <!-- Edit Modal (Pop-up Form for Editing) -->
    <div id="editModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Inventory</h5> <!-- Title of the modal | Pamagat ng modal -->
                    <button type="button" class="close" data-dismiss="modal">&times;</button> 
                    <!-- Close button | Pindutan para isara -->
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" id="edit-inventory_id" name="inventory_id">
                        <!-- Hidden input for inventory ID | Nakatagong input para sa inventory ID -->
                        
                        <div class="form-group">
                            <label>User ID:</label>
                            <input type="text" id="edit-user_id" name="user_id" class="form-control" maxlength="8" required>
                            <!-- Input field for User ID | Lagayan ng User ID -->
                        </div>

                        <div class="form-group">
                            <label>Location:</label>
                            <input type="text" id="edit-loc" name="loc" class="form-control" maxlength="12" required>
                            <!-- Input field for Location | Lagayan ng Lokasyon -->
                        </div>

                        <div class="form-group">
                            <label>Item Code:</label>
                            <input type="text" id="edit-item_id" name="item_id" class="form-control" maxlength="12" required>
                            <!-- Input field for Item Code | Lagayan ng Kodigo ng Item -->
                        </div>

                        <div class="form-group">
                            <label>Quantity:</label>
                            <input type="number" id="edit-qty" name="qty" class="form-control" min="1" max="9999" required>
                            <!-- Input field for Quantity | Lagayan ng Dami -->
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Save Changes</button> 
                        <!-- Button to save changes | Pindutan para isave ang pagbabago -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 for better alerts | SweetAlert2 para sa mas magandang alerto -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery (Needed for Bootstrap) | jQuery (Kailangan para sa Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS (For modal functionality) | Bootstrap JS (Para gumana ang modal) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- External JavaScript file for handling data | Panlabas na JavaScript file para sa paghawak ng data -->
<script src="../js/review-data.js"></script>
