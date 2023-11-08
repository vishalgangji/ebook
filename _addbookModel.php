<div class="modal fade" id="addbook" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Add to E-BookHouse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- <button class="btn btn-outline-warning ml-2" data-toggle="modal" data-target="#loginModal">User Login</button> -->
            <form action="_handleaddbook.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="bookname">Book Name</label>
                        <input type="text" class="form-control" id="bookname" name="bookname">
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Book Desperation</label>
                        <input type="text" class="form-control" id="bookdes" name="bookdes">
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Book Author</label>
                        <input type="text" class="form-control" id="bookauth" name="bookauth">
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Book Image</label>
                        <input type="file" class="form-control" id="bookimage" name="bookimage">
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Book</label>
                        <input type="file" class="form-control" id="fileup" name="file">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>