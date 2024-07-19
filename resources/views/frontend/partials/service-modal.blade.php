    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="serviceForm" action="" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">


                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="description">Description (optional)</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="duration">Duration (mins)</label>
                                    <input type="text" class="form-control" id="duration" required name="duration"
                                        placeholder="">
                                </div>
                            </div>
                        </div>


                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="duration">Job Location Type</label>
                                    <select name="job_location_type" class="form-control" id="job_location_type">
                                        <option value="">Select</option>
                                        <option value="ONSITE">ONSITE</option>
                                        <option value="HYBRID">HYBRID</option>
                                        <option value="REMOTE">REMOTE</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="amount">Amount (₹)</label>
                                    <input type="text" class="form-control" id="amount" required name="amount"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row g-lg-4 mb-1">
                            <div class="col-lg-4 mb-3">
                                <div class="form-group">
                                    <label for="experience_years">Experience (Years) (optional)</label>
                                    <input type="text" class="form-control" id="experience_years"
                                        name="experience_years" placeholder="">
                                </div>
                            </div>
                        </div>


                        <div id="conditionalFields">


                        </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submitBtn" class="btn btn-primary">Save changes</button>
                    </div>


                    <input type="hidden" name="service_category" id="service_category" />

                </form>

            </div>
        </div>
    </div>