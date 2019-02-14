<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">ได้รับสินค้าเรียบร้อย</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
    
              <form method="POST" action="{{ route('orders.sellerreview', [$orderHeaders->order_number]) }}" enctype="multipart/form-data">
                  {!! csrf_field() !!} 
                  <input type="hidden" name="order_id" value="{{ $orderHeaders->id }}">
                  <input type="hidden" name="order_number" value="{{ $orderHeaders->order_number }}">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">คะแนน:</label>
                    {{-- <input name="score" type="text" class="form-control" id="recipient-name"> --}}
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                </div>
                <div class="form-group has-feedback{{ $errors->has('comment') ? ' has-error' : '' }}">
                  <label for="message-text" class="col-form-label">Comment:</label>
                  <textarea name="comment" class="form-control" id="message-text"></textarea>
                  @if ($errors->has('comment'))
                      <span class="help-block">
                          <strong>{{ $errors->first('comment') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="row">
                    <div class="col-sm-6 imgUp">
                      <div class="imagePreview  has-feedback{{ $errors->has('img1') ? ' has-error' : '' }}"></div>
                        <label class="btn btn-primary">Upload
                          <input name="img1" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                        @if ($errors->has('img1'))
                            <span class="help-block">
                                <strong>{{ $errors->first('img1') }}</strong>
                            </span>
                        @endif
                    </div><!-- col-2 -->
                    <i class="fa fa-plus imgAdd"></i>
                </div><!-- row -->
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-danger">Send message</button>
              </div>
             </form>
          </div>
        </div>
      </div>