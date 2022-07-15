<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center mt-4 mb-3">Confirm Action</h3>
                        <p class="text-center">Are you sure you want to delete this record?</p>
                    </div>
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-sm-4 offset-sm-2 float-left">
                        <button class="btn btn-block btn-secondary card--mb-bottom" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="col-sm-4 float-right">
                        <form method="post" id="deleteForm">
                            <input type="hidden" name="id" id="identity">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-block btn-danger" type="submit" style="background: black; border: 1px solid black; outline: none">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
