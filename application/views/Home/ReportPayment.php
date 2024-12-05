<div class="wrapper">
    <?php $this->load->view('partials/left_sidebar'); ?>
    
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-sm-6">
                        <h2>Search Payments</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center bg-light">
                    <div class="col-lg-12">
                        <div class="card card-primary px-5 py-5">

                            <form id="searchForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="contact_number" class="col-sm-3 pl-5 text-small">
                                            Search Contact Number of Farmer/Agent/Retailer
                                        </label>
                                        <input type="text" name="contact_number" class="col-md-6 mr-4" id="contact_number" placeholder="Enter contact number" style="height:45px; border-radius:4px;">
                                        <button type="button" id="searchButton" class="btn btn-dark pt-2" style="width:120px;height:45px;letter-spacing:3px;border-radius:4px;">SEARCH</button>
                                    </div>
                                </div>
                            </form>

                            <!-- Results table will be populated by JavaScript -->
                            <table id="resultsTable" class="ml-[12%] w-[80%] border-separate border-spacing-4 text-lg border border-slate-400" style="display: none;">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border border-slate-300">Name</th>
                                        <th class="border border-slate-300">Code</th>
                                        <th class="border border-slate-300">Contact Number</th>
                                        <th class="border border-slate-300">Type</th>
                                    </tr>
                                </thead>
                                <tbody id="resultsBody">
                                    <!-- Results will be appended here -->
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-between mt-3 col-md-6" style="margin-left:250px;">
                                <h2 class="text-success">Total payments <br> 0</h2>
                                <span class="text-primary" style="font-size:xx-large;">|</span>
                                <h2 class="text-danger">Total Dues <br> 0 </h2>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn px-5 py-2 btn-primary btn-lg">Add New Payment</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    $('#searchButton').click(function() {
        var contactNumber = $('#contact_number').val();

        // Send AJAX request to the server
        $.ajax({
            url: '<?php echo base_url('index.php/Home/search_contact'); ?>',
            type: 'GET',
            data: { contact_number: contactNumber },
            success: function(response) {
                try {
                    var data = JSON.parse(response);  // Parse JSON response
                } catch (e) {
                    alert("Invalid response format.");
                    return;
                }

                if (data.error) {
                    alert(data.error);  // Show error message from the server
                } else {
                    $('#resultsBody').empty();

                    if (data.length > 0) {
                        $('#resultsTable').show();

                        $.each(data, function(index, item) {
                            var row = '<tr class="text-2xl text-center">' +
                                      '<td class="px-2 text-xl">' + item.name + '</td>' +
                                      '<td class="px-2 text-xl">' + item.code + '</td>' +
                                      '<td class="px-2 text-xl">' + item.contact_number + '</td>' +
                                      '<td class="px-2 text-xl">' + item.type + '</td>' +
                                      '</tr>';
                            $('#resultsBody').append(row);
                        });
                    } else {
                        $('#resultsTable').hide();
                        alert('No results found.');
                    }
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + xhr.responseText);  // Show the error message
                console.log(xhr.responseText);  // Log error to the console
            }
        });
    });
});

</script>
