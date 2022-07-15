<div class="modal fade" id="ajax-book-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Comment</h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm"
                    class="form-horizontal" method="POST">
                    <input type="hidden" name="id" value="" id="review-id">
                    <input type="hidden" name="rating" value="" id="rating">
                    <div class="editRate edit-rate-modal d-flex ">

                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="comments-model" name="comment"
                                placeholder="Enter Comment" value="" maxlength="50"
                                required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-primary" id="btn-save"
                            value="addNewBook">Save
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
