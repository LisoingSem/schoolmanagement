<div class="modal fade" id="createClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                        <form action="action_save.php" method="post">

                              <div class="mb-3">
                                    <label for="name" class="form-label">Course Name :</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Course Name" required>
                              </div>

                              <div class="mb-3">
                                    <label for="price" class="form-label">Price :</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price ( $ )" required>
                              </div>

                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="btn_save">Save</button>
                              </div>
                              
                        </form>
                  </div>
                  
            </div>
      </div>
</div>